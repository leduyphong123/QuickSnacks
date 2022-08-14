<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckAdminLogin;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public function __construct()
    {
        $cates = DB::table('quicksnacks.categoryyy')->get();
        View::share('cates', $cates);
    }
    public function login()
    {
        return view('admin.login_admin');
    }

    public function check_login(Request $request)
    {
        $admin = DB::table('quicksnacks.adminnn')->where('admin_username', $request->username)->where('password', md5($request->password))->first();
        if ($admin) {
            Session::put('admin_username', $admin->admin_username);
            Session::put('password', $admin->password);
            return redirect()->action([AdminController::class, 'dashboard']);
        } else {
            Session::put('messenger', 'Incorrect username or password.');
            return redirect()->action([AdminController::class, 'login']);
        }
    }

    public function logout(Request $request)
    {
        Session::put('admin_username', null);
        Session::put('password', null);;
        return redirect()->action([AdminController::class, 'login']);
    }

    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        $admin = DB::select('SELECT * FROM adminnn');
        return view('admin.profile_admin', ['admin' => $admin]);
    }
    public function editProfile()
    {
        $admin = DB::select('SELECT * FROM adminnn');
        return view('admin.edit_profile', ['admin' => $admin]);
    }
    public function updateProfile(Request $request)
    {
        $name = $request->input('inputUsername');
        $email = $request->input('inputEmail');
        $pass = md5($request->input('inputPass'));
        DB::update('UPDATE quicksnacks.adminnn set admin_username = ?,password = ?,email = ? where admin_id = 1', [$name, $pass,$email]);
        return redirect()->action([AdminController::class, 'profile']);
    }
    //
    public function usermanagement()
    {
        $users = DB::select('SELECT * FROM quicksnacks.customer_detailll');
        return view('admin.user_management', ['users' => $users]);
    }


    public function forgotPassword()
    {
        $emaill = DB::table('quicksnacks.adminnn')->first();
        if ($emaill) {
            mail::send('admin.admin_sendMail', compact('emaill'), function ($email) use ($emaill) {
                $email->from('nguyentrungviet13032003@gmail.com', 'QuickSnack');
                $email->to($emaill->email, 'toi');
            });
            Session()->flash('forgot', 'Please check your email.');
            return back();
        } else {
            session::put('f', 'Wrong email ');
            return back();
        };
    }

    public function newPassword($email)
    {
        return view('admin.newpassword', ['email' => $email]);
    }
    public function savePassword(Request $request, $phong)
    {
        $new = $request->input('newpass');
        DB::update('update quicksnacks.adminnn set password =? where email = ?', [md5($new), $phong]);
        return view('admin.login_admin');
    }
}
