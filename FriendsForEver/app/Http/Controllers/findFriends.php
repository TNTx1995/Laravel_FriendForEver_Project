<?php

namespace App\Http\Controllers;
use \App\Register;
use Illuminate\Http\Request;
use \App\Friend;
class findFriends extends Controller
{
    public function searchSomeOne(Request $req){
        $isFrendRequested = False;
        $userHandleEmail =  session('handle')['userEmail'];
        $userInfo = Register::where(['userEmail'=>$userHandleEmail])->first();
        $userHandleID = $userInfo->id;
        echo "<h1> Handle Search ID $userHandleID</h1> is user id";
        $searchEmail = $req->input('searchUserEmail');
        $findInfo = Register::where('userEmail',$searchEmail)->first();
        echo "<h1>  Search ID $findInfo->id</h1> ";
        if($findInfo == null)return "no such user exist";
        //checking the user is friend or requested

        $checkRequest = Friend::where('user_id',$findInfo->id)->first();
        $holdreq =  $checkRequest->user_Friends_RequestId;
        $parts_FriendReq = explode('/',$holdreq);
        print_r($parts_FriendReq);
      
        
        for($i = 0;$i<count($parts_FriendReq);++$i){
            if($parts_FriendReq[$i] == $userHandleID){
                $isFrendRequested = True;
                echo "got an friend request ";
                break;
            }

        }
        if($isFrendRequested == False){
            return view('friend.aboutSearchUser')->with(['findInfo'=>$findInfo,
            'friendReqStatus'=>'false',
            'requestId'=>$userHandleID]);
        }
        else return view('friend.aboutSearchUser')->with(['findInfo'=>$findInfo,
        'friendReqStatus'=>'true',
        'requestId'=>$userHandleID
        ]);
        






        //return view('friend.aboutSearchUser',compact('findInfo'));
    }
    public function friendRequest($rID,$sID){
        $query1 = Friend::where('user_id',$sID)->first();
        $holdReqList = $query1->user_Friends_RequestId;
        if($holdReqList  == "dummy"){
            $holdReqList = "/".$rID;
        }
        else $holdReqList = $holdReqList."/".$rID;
        $query2 = Friend::where('user_id',$sID)->update([
            'user_Friends_RequestId' =>$holdReqList
        ]);
        return "Friend Request Sent Successfully";
    }
    public function cancelRequest($rID,$sID){
       $query1 = Friend::where('user_id',$sID)->first();
       $holdFriendReq = $query1->user_Friends_RequestId;
       $updateRequestList = "";
       $friendRequestList = explode('/',$holdFriendReq);
       for($i = 0;$i<count($friendRequestList);$i++){
           if($friendRequestList[$i] == $rID){
               continue;
           }
           else{
               $updateRequestList = $updateRequestList."/".$friendRequestList[$i];
           }
       }
       $query2 = Friend::where('user_id',$sID)->update([
            'user_Friends_RequestId' =>$updateRequestList
        ]);
       return "Friend Request is Cancelled ";
    }
   





}
/*$isInside = Friend::where('user_id',$id)->get();
        if(count($isInside) == 1){
            $query = Friend::where('user_id',$id)->first();
            $updateRequest = $query->user_Friends_RequestId."/".$id;
            echo $query->user_Friends_RequestId."   ".$updateRequest;
            $query2 = Friend::where('user_id',$id)->update([
                'user_Friends_RequestId' =>$updateRequest
            ]);
            if($query2)return "Friend Request Sent successfully";
            
            

            

            //return "need to update client friend  request ";

        }
        if(count($isInside) == 0){
          return "no such user in this system";
        

        }    */

        /* $isInside = Friend::where('user_id',$id)->get();
        if(count($isInside) == 1){
            $query = Friend::where('user_id',$id)->first();
            $updateRequest = $query->user_Friends_RequestId;
           if($updateRequest == "dummy"){
               $updateRequest = "";
               $updateRequest =$updateRequest."/".$id;

           }
           else $updateRequest = $updateRequest."/".$id;
           $query2 = Friend::where('user_id',$id)->update([
            'user_Friends_RequestId' =>$updateRequest
             ]);
            if($query2)return "Friend Request Sent successfully";
            
        } */