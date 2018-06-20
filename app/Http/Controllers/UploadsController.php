<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Uploads;

class UploadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function media(){
//        $path    = public_path('uploaded_media/'.auth()->user()->id);
//        $files = array_diff(scandir($path), array('.', '..','.DS_Store'));
        return view('admin.pages.media');
    }
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().$image->getClientOriginalName();
        $image->move(public_path('uploaded_media/'.auth()->user()->id),$imageName);
        return response()->json(['success'=>$imageName]);
    }
    protected function storeUploadedFile(UploadedFile $uploadedFile)
    {
        $upload = new Uploads();
        $upload->fill([
            'filename' => $uploadedFile->getClientOriginalName(),
            'size' => $uploadedFile->getSize(),
        ]);
        $upload->user()->associate(auth()->user());
        $upload->save();
        return $upload;
    }

    public function destroy($user_id, $upload)
    {
        if($user_id==auth()->user()->id){
            $filename = public_path('uploaded_media/'.$user_id).'/'.$upload;
            unlink($filename);
            return redirect('media');
        }
    }
    public function get_table()
    {
        $path    = public_path('uploaded_media/'.auth()->user()->id);
        $files = array_diff(scandir($path,1), array('.', '..','.DS_Store'));
        $return = '';
        if(count($files)>0):
            foreach($files as $file):
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $return .= '<tr>';
                if($ext=='docx' || $ext=='doc'){
                    $return .= '<td class="text-info"><i class="fa fa-file-word-o fa-2x"></i></td>';
                }elseif($ext=='pdf'){
                    $return .= '<td class="text-danger"><i class="fa fa-file-pdf-o fa-2x"></i></td>';
                }elseif($ext=='zip'){
                    $return .= '<td class="text-warning"><i class="fa fa-file-zip-o fa-2x"></i></td>';
                }else{
                    $return .= '<td><img src="'.asset('uploaded_media/'.auth()->user()->id.'/'.$file).'" style="height:40px;" /></td>';
                }

                $return .= '<td>'.$file.'</td>
                            <td>
                                <a href="'.url('uploaded_media/'.auth()->user()->id.'/'.$file).'" target="_blank">
                                    uploaded_media/'.auth()->user()->id.$file.'
                                </a>
                            </td>
                            <td>
                                <button type="button" onclick="deleteMedia('.auth()->user()->id.',\''.$file.'\')" class="btn btn-danger btn-small">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>';
            endforeach;
        endif;
        return $return;
    }
}
