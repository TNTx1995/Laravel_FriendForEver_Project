<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Register;
use \App\Friend;
class friendOrRequestList_Show extends Controller
{
    public function viewAllFriendRequestList(){
       return view('friend.allFriendRequestList');
    }
    public function viewFriendsList(){
        return view('friend.allFriendsList');
    }
    
    
}
