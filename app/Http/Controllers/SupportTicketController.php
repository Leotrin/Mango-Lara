<?php

namespace App\Http\Controllers;

use App\Model\SupportTicket;
use App\User;
use Illuminate\Support\Facades\Validator;

class SupportTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $myID = auth()->user()->id;
        $tickets = SupportTicket::where('user_id',$myID)->orWhere('to_user_id',$myID)->groupBy('ticket_id')->get();
        $users = User::where('id','!=',$myID)->get();

        return view('admin.pages.support.list',compact('tickets', 'users'));
    }
    public function ticket($id){
        $myID = auth()->user()->id;
        $tickets = SupportTicket::where(function($query) use ($myID){
            $query->where('user_id',$myID);
            $query->orWhere('to_user_id',$myID);
        })->where('ticket_id',$id)->latest()->get();
        $ticket = SupportTicket::where(function($query) use ($myID){
            $query->where('user_id',$myID);
            $query->orWhere('to_user_id',$myID);
        })->where('ticket_id',$id)->latest()->first();
        return view('admin.pages.support.ticket',compact('tickets','id','ticket'));
    }
    public function replayTicket($id){
        $myID = auth()->user()->id;
        $ticket = SupportTicket::where(function($query) use ($myID){
            $query->where('user_id',$myID);
            $query->orWhere('to_user_id',$myID);
        })->where('ticket_id',$id)->latest()->first();
        if($ticket!=null) {
            $status = 2;

            if ($ticket->status == 0) {
                $status = 1;
            }
            if ($ticket->status != 3) {
                $replayTicket = new SupportTicket();
                $replayTicket->to_user_id = $ticket->user_id;
                $replayTicket->user_id = auth()->user()->id;
                $replayTicket->subject = $ticket->subject;
                $replayTicket->priority = $ticket->priority;
                $replayTicket->content = request('content');
                $replayTicket->ticket_id = $ticket->ticket_id;
                $replayTicket->status = $status;
                $replayTicket->save();
            }
            return redirect('support/ticket/' . $id);
        }else{
            return redirect('support');
        }
    }
    public function newTicket(){
        $this->validator(request()->all())->validate();

        $ticket = new SupportTicket();
        if(request('to_user_id')!=null){
            $ticket->to_user_id = request('to_user_id');
        }
        $ticket->user_id    = auth()->user()->id;
        $ticket->subject    = request('subject');
        $ticket->priority   = request('priority');
        $ticket->content    = request('content');
        $ticket->save();

        $ticket->ticket_id    = $ticket->id;
        $ticket->save();

        return redirect('support');
    }
    public function complete($id){
        $myID = auth()->user()->id;
        $ticket = SupportTicket::where(function($query) use ($myID){
            $query->where('user_id',$myID);
            $query->orWhere('to_user_id',$myID);
        })->where('ticket_id',$id)->latest()->first();
        if($ticket!=null && $ticket->status != 3) {
            $replayTicket = new SupportTicket();
            $replayTicket->to_user_id   = $ticket->user_id;
            $replayTicket->user_id      = auth()->user()->id;
            $replayTicket->subject      = $ticket->subject;
            $replayTicket->priority     = $ticket->priority;
            $replayTicket->content      = $ticket->content.' <br />Ticket Completed !';
            $replayTicket->ticket_id    = $ticket->ticket_id;
            $replayTicket->status       = 3;
            $replayTicket->save();
            return redirect('support/ticket/' . $id);
        }else{
            return redirect('support');
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subject' => 'required',
            'priority' => 'required',
            'content' => 'required',
        ]);
    }
}
