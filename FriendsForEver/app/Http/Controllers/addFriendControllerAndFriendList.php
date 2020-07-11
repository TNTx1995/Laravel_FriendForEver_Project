<?php

  
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Friend;
use \App\Register;
class addFriendControllerAndFriendList extends Controller
{   
    
    public function addFriend($rID,$sID){
      
      $query = Friend::where('user_id',$sID)->first();
      $holdReqList = $query->user_Friends_RequestId;
      $holdFriendList = $query->userFriendsId;
      $frndReqLst = explode('/',$holdReqList);
      $friendList = $query->userFriendsId;
      $updateReqList = "";
      for($i = 0;$i<count($frndReqLst);$i++){
        if($rID == $frndReqLst[$i]){
          continue;
        }
        else $updateReqList  = $updateReqList."/".$frndReqLst[$i];
      }
       $query2 = Friend::where('user_id',$sID)->update([
        'user_Friends_RequestId' =>$updateReqList
        ]);
        $updateFriendList =$friendList."/".$rID;
        $query3 = Friend::where('user_id',$sID)->update([
          'userFriendsId' =>$updateFriendList
        ]);

        $reqFriendList = Friend::where('user_id',$rID)->first();
        $holdReqFriendList = $reqFriendList->userFriendsId;
        $updateRequestUserIdFriends = $holdReqList."/".$sID;
        $query4 = Friend::where('user_id',$rID)->update([
          'userFriendsId' =>$updateRequestUserIdFriends
        ]);
        if($query3 && $query4)return "Accepted Friend Request ";
        else return "something went wrong";
            

    }
}
