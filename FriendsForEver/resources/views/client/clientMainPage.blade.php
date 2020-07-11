<div align = "right"> 
   <form action ="{{URL::to('client/searchByEmail')}}" method = "post">
   @csrf
    <h1>Find Friend</h1>
       <input type = "text" name = "searchUserEmail">
        <input type="submit" value="Search">
    </form>
</div>
<h1>Client Page </h1>
{{$userInfo->userEmail}}<br><br>
{{session('handle')['userEmail']}}  

<h1><a href = "{{route('viewFrndReqLst')}}" >View All Friend Request </a></h1>
<h1><a href = "{{route('viewAllFriends')}}">View All Friends </a></h1>
