<h1>All Friend Request List</h1> 
{{session('handle')['userEmail']}}  
<?php 
    use \App\Friend;
    use \App\Register;
    $holdItemLest;
    $handleEmail = session('handle')['userEmail'];
    $handleInfo = Register::where('userEmail',$handleEmail)->first();
    $handleId = $handleInfo->id;
    $handleReqCount = Friend::where('user_id',$handleId)->get();
    if(count($handleReqCount)>0){
        $handleRequest  = Friend::where('user_id',$handleId)->first();
        $holdReqList = $handleRequest->user_Friends_RequestId;
        $holdItemLest = explode('/',$holdReqList);
        echo "<table>";
            for($i = 0;$i<count($holdItemLest);$i++){
                echo "<tr>";
                        $reqInfo = Register::where('id',$holdItemLest[$i])->first();
                        $reqId = $reqInfo['id'];
                      
                        if($reqId){
                           
                            echo "<td>";echo $reqInfo['userEmail'] ; echo "</td>";
                            echo "<form action ='/client/add-friendToList/requestID/$reqId/handleID/$handleId' method = 'get'>";
                                echo "<td>";echo"<input type = 'submit'value = 'Add Friend'>";  echo "</td>";
                            echo "</form>";
                            echo "<form action ='/client/Delete-friendToList/requestID/$reqId/handleID/$handleId/deleteingReq' method = 'get'>";
                                echo "<td>";echo"<input type = 'submit'value = 'Cancel Request'>";  echo "</td>";
                            echo "</form>";
                           
                          
                        }
                      
                echo "</tr>";
            }
        echo "</table>";
    }   
    else {
        return "<h1>No Such Friend Request Exist yet !</h1>";
    }
?>
