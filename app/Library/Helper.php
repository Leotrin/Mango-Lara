<?php
namespace App\Library;
class Helper {
    static function priority($priority){
        switch($priority){
            case 'High':
                return "<span class='label label-danger'>High</span>";
                break;
            case 'Medium':
                return "<span class='label label-primary'>Medium</span>";
                break;
            case 'Low':
                return "<span class='label label-info'>Low</span>";
                break;
        }
    }
    static function status($status){
        switch($status){
            case 0:
                return "<span class='label label-danger'>Not answered</span>";
                break;
            case 1:
                return "<span class='label label-primary'>Answered</span>";
                break;
            case 2:
                return "<span class='label label-info'>Processing</span>";
                break;
            case 3:
                return "<span class='label label-success'>Completed</span>";
                break;
        }
    }
}