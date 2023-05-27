<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
   
    //To view registraion blade
    public function registration()
    {
        $motherUnits = MotherUnit::select('mother_unit')->get();  
        return view('auth.registration', compact('motherUnits'));
    }


     //To store registration details
     public function customRegistration(Request $request)
     {
         $formdata = $request->validate([
             'name' => ['required','min:3'],
             'pen' => 'required|unique:users|digits:6',
             'mother_unit' => 'required',
             'password' => 'required|confirmed|min:8',
             'role' => '',
             'applied' => ''
         ]);
      //Hash Password
      $formdata['password'] = bcrypt($formdata['password']);
      User::create($formdata);
      return redirect()->route('login')->with('message','Registration completed Successfully');
     }


    //To View Login Page
    public function index()
    {
        return view('auth.login');
    }


    //To fetch login details
    public function customLogin(Request $request)
    {     
        $request->validate([
            'pen' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('pen', 'password');
        if (Auth::attempt($credentials)) {
               return redirect()->route('dashboard')->withSuccess('Signed in');
             }
        return redirect()->route('login')->with('message','Login Failed!  Please Try Again... ');
    }


    // decide user by role
    public function dashboard()
    {  
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('user-home')->with('message','Login successful... ');
            } elseif (Auth::user()->role == 2) {
                return redirect(route('unitHead-initialSetup'));
            } elseif (Auth::user()->role == 3) {
                return redirect()->route('ri-home')->with('message','Login successful... ');
            } elseif(Auth::user()->role == 4) {
                return redirect()->route('admin-home')->with('message','Login successful... ');
            } else {
                return redirect()->route('login')->with('message','Permission denied. Contact support. ');
            }
        }
        return redirect()->route('login');
    }


    //To signOut 
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('message','Logged out Successfully');
    }
}
