<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Va1idator;
use App\Models\User;
class AuthController extends Controller
{
    public function showRegisterForm(){
        $data =[];
        return view('register',$data);
    }
    public function register(Request $request)
    {
        $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:users,email',
             'phone_no'=>'required|numeric',
             'password'=>'required|min:6',
             'address'=>'required',
          ]);

        $inputs = $request->except(['_token']);
        $inputs['password'] = bcrypt($inputs['password']);

        try{
    User::create($inputs);
            session()->flash('message','registartion completed successfully');
        return redirect()->route('login');

    //     'name' => $request->input('name'),
    //     'email' => $request->input('email'),
    //     'mobile_no' => $request->input('mobile_no'),
    //     'password' => bcrypt( $request->input('password')),
    //     'address' => $request->input('address'),

            }catch (Exception $e){
            session()->flash('message', $e->getMessage());
            return redirect()->back();

        }



        }

    public function showLoginForm()
    {
        $data =[];
        return view('login', $data);
    }
    public function login(Request $request){
        $request->validate([

            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);

            $credentials = $request->except(['_token']);
            if(auth()->attempt($credentials))
            {
            echo 'logged in';
              die();
            }

            session()->flash('message', 'invalid credential');
        return redirect()->back();
    }
}
