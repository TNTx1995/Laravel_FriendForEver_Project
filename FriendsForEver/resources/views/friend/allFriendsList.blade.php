<h1>All Friends List </h1>

<?php
    use \App\Friend;
    use \App\Register;
    
    $handleEmail = session('handle')['userEmail'];
    $handleInfo = Register::where('userEmail',$handleEmail)->first();
    $handleId = $handleInfo->id;
    $userFriendsInfo = Friend::where('user_id',$handleId)->first();
    //echo $userFriendsInfo,"<br>";
    $holdUserFriendList  = $userFriendsInfo['userFriendsId'];
    $friendList = explode('/',$holdUserFriendList);
    for($i = 0;$i<count($friendList);$i++){
        $holdFriendId = $friendList[$i];
        $firendQuery = Register::where('id',$holdFriendId)->first();
        echo $firendQuery['userEmail']."<br>";
        
    }




?>