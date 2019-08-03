<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function  RegistrationForm(){
        $data =[];
        $data['sidbar'] = false;
        return  view('frontened.register',$data);
    }

    public  function RegistrationProcess(Request $request){
//  $request ->except('_token');
//return $request;

        $request ->validate([
            'name' => 'required',
            'email' => 'required | email | unique:users',
            'contact_no' =>'required',
            'password' => 'required | min:6'
        ]);
 //return back()->with('errors')->withinput();

 $inputs = $request->except('_token');
 $inputs['password'] = bcrypt($inputs['password']);

 try{
    $user = User:: create($inputs);
    event(new  Registered($user));
     session()->flash('type', 'success');
     session()->flash('message', 'registered successfully');
     return redirect()-> route('register');
 }catch(\Exception $e){
     session()->flash('type', 'danger');
     session()->flash('message', 'fail to register');
     return redirect()->route('register');
 }
    }
    public  function LoginForm(){
        $data =[];
        $data['sidbar'] = false;
        return view('frontened.login',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function LoginProcess(Request  $request){

        $request ->validate([

            'email' => 'required | email  ',
            'password' => 'required | min:6'
        ]);


        $login = $request->except('_token');
        if ( auth()->attempt($login)) {

           $user = auth()->user();
            if ($user->hasVerifiedEmail()== true){
            return redirect()->route('dashboard');
        }
           session()->flash('type', 'danger');
            session()->flash('message', 'you need to verify your email TO login');
            return redirect()->back();
       }

        session()->flash('type', 'danger');
        session()->flash('message', 'invalid credential');
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        session()->flash('type', 'warning');
        session()->flash('message','you have been logged out');
        return redirect()->route('login');
    }
}
