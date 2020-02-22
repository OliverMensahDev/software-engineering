<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    
    private $successStatus = 200;
   /**
    * login api
    *
    * @return \Illuminate\Http\Response
    */
   public function login(Request $request){
       if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
           $user = Auth::user();
           $success['token'] =  $user->createToken('MyApp')->accessToken;
           return response()->json(['success' => $success], $this->successStatus);
       }
       else{
           return response()->json(['error'=>'Unauthorised'], 401);
       }
   }

   /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
   public function register(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required',
       ]);
       if ($validator->fails()) {
           return response()->json(['error'=>$validator->errors()], 401);            
       }
       $input = $request->all();
       $alreadyRegisteredEmail = User::where('email', $input['email'])->first();
       if ($alreadyRegisteredEmail) {
           return response()->json(['error' => 'Email already registered'], 401);
        }
       $input['password'] = bcrypt($input['password']);
       $user = User::create($input);
       $success['token'] =  $user->createToken('MyApp')->accessToken;
       return response()->json(['success'=>$success], $this->successStatus);
   }
   
   /**
    * details api
    *
    * @return \Illuminate\Http\Response
    */
   public function getDetails()
   {
       $user = Auth::user();
       return response()->json(['success' => $user], $this->successStatus);
   }

   public function logout(Request $request)
   {
       if (Auth::check()) {
           $request->user()->token()->revoke();
        }
        return response()->json(['message' => 'User logged out.'], 200);
    }
    

}