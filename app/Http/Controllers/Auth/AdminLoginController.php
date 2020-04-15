<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function ShowLoginForm()
    {
      return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      //validate
      $this->validate($request, [
          'email'   => 'required|email',
          'password' => 'required|min:6'
      ]);

      //attempt
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      //if successful
          return redirect()->intended(route('admin.dashboard'));
      }
      //if unsuccessful
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
