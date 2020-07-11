<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Register;
use \App\Friend;
use DB;
class registerController extends Controller
{
  public function viewRegisterPage(){
     return view('Registration.registration');
 }
 public function registerInfoInsert(Request $req){
      $validateData = $req->validate([
        'userName'=>'required',
        'userEmail'=>'required',
        'userPassword'=>'required',
        'userConfirmPassword'=>'required',
        'userGender'=>'required',
        'userBirthDay'=>'required',
        'userContact'=>'required'
      ]);
      if($validateData){
        $reg  = new Register;
        $reg->userName = $req->userName;
        $reg->userEmail = $req->userEmail;
        $reg->userPassword = $req->userPassword;
        $reg->userConfirmPassword = $req->userConfirmPassword;
        $reg->userContact = $req->userContact;
        $reg->userBirthday = $req->userBirthDay;
        $reg->userGender = $req->userGender;
        $reg->save();
        // for inserting the id of the friend list
        $query = Register::where(['userEmail'=>$req->userEmail])->first();
        $insert = new Friend;
        $insert->user_id = $query->id;
        $insert->userFriendsId = "dummy";
        $insert->user_Friends_RequestId = "dummy";
        $insert->save();
    
         return "<script>alert('Registration is Done Successfully!')</script>";
      }
      else return "<script>alert('Registration is Done Successfully!')</script>";
     }
     public function loggingControl(Request $req){
      if($req->userEmail == "alfa@gmail.com" && $req->userPassword =="ruhulamin")
      return redirect()->route('adminView');
        $checkUser = DB::table('registers')->where(['userEmail'=>$req->userEmail,'userPassword'=>$req->userPassword])
        ->get();
        if(count($checkUser)>0){
          $userInfo = Register::where('userEmail',$req->userEmail)->first();
          $req->session()->put('handle',$req->input());
          


          return view('client.clientMainPage',compact('userInfo'));

        }

     }

}
