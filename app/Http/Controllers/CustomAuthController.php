<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MotherUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
   
    //To view registraion blade
    public function registration()
    {
        $motherUnits = MotherUnit::all();  
        return view('auth.registration', compact('motherUnits'));
    }

     //To store registration details
     public function customRegistration(Request $request)
     {
       
         $formdata = $request->validate([
             'name' => ['required','min:3'],
             'pen' => 'required|unique:users',
             'mother_unit' => 'required',
             'password' => 'required|confirmed|min:8',
             'role' => '',
             'applied' => ''
         ]);
 
      //Hash Password
      $formdata['password'] = bcrypt($formdata['password']);
      User::create($formdata);
    //   // Create user
    //   $user = User::create($formdata);
    //   // Login
    //   auth()->login($user);
    // redirect to login page
      return redirect()->route('login');
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
         
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
             }
        
        return redirect()->route('login');
    }


    

   

    // //To store registration details( After reach customRegistration )
    // public function create(array $data)
    // {

    //     return User::create([
    //         'name' => $data['name'],
    //         'pen' => $data['pen'],
    //         'role' => $data['role'],
    //         'unit' => $data['unit'],
    //         'action' => $data['action'],
    //         'password' => Hash::make($data['password'])
    //     ]);
    // }


    //Redirect users access    
    public function dashboard()
    {  
      
        if (Auth::check()) {
        
            $user = Auth::user();
            $name = $user->name;
            $role_id = $user->role; //verify role 
            $action_id = $user->Action; //verify action

            if ($role_id == 'admin') {
                return view('admin.admin_home');
            } elseif ($role_id == 1) {
                return view('user.home');
            } elseif (Auth::user()->role == 2) {
                return redirect(route('unitHead-manage_profile'));
            } elseif (Auth::user()->role == 3) {
                return view('ri.home');
            } else {
                return redirect()->route('login');
            }
        }

        return redirect()->route('login');
    }

    //To signOut 
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

}
