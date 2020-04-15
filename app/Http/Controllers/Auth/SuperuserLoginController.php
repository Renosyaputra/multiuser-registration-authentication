<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class SuperuserLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:superuser');
    }

    public function ShowLoginForm()
    {
      return view('auth.superuser-login');
    }

    public function login(Request $request)
    {
      //validate
      $this->validate($request, [
          'email'   => 'required|email',
          'password' => 'required|min:6'
      ]);

      //attempt
      if (Auth::guard('superuser')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      //if successful
          return redirect()->intended(route('superuser.dashboard'));
      }
      //if unsuccessful
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
