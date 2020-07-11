<h1>Searching Result</h1>
    <div align ="right">
        
       
            @if($friendReqStatus == 'false') 
                <form   action = "{{url('client/search-result/requestID/'.$requestId.'/searchID/'.$findInfo->id)}}" method = "get">
                    
                    <input type = "submit" value = "Add Friend" >
                </form>
            @endif

            @if($friendReqStatus == 'true')
           
                <form action = "{{url('client/search-result/removeRequest/requestID/'.$requestId.'/searchID/'.$findInfo->id)}}" method = "get">
                    <input type = "submit" value = "Cancel Request ">
                </form>
            @endif

            
          
       
    </div>
<div>
    <table>
        <tr>
            <td><h1>user Name</h1></td>
            <td><h1>{{$findInfo->userName}}</h1></td>
        </tr>
        <tr>
            <td><h1>User Email</h1></td>
            <td><h1>{{$findInfo->userEmail}}</h1></td>
        </tr>
        <tr>
            <td><h1>User Contact</h1></td>
            <td><h1>{{$findInfo->userContact}}</h1></td>
        </tr>
        <tr>
            <td><h1>User Gender</h1></td>
            <td><h1>{{$findInfo->userGender}}</h1></td>
        </tr>
        <tr>
            <td><h1>User Birth Day</h1></td>
            <td><h1>{{$findInfo->userBirthday}}</h1></td>
        </tr>
      
    </table>
</div>