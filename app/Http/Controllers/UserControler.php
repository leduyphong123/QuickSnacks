<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;

class UserControler extends Controller
{
    public function __construct(){
        $cates=DB::table('quicksnacks.categoryyy')->get();
        View::share('cates',$cates);
    }
    public function authLogin()
    {
        $re = Session::get('id_user');
        if ($re) {
            return Redirect::to('/profile');
        } else {
            return Redirect::to('/client/login')->send();
        }
    }
    public function index()
    {
        return view('client.login_user');
    }

    //register client
    public function clientregister(){
        return view('client.register_user');
    }
    public function store(Request $request)
    {
        $username = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $chek = DB::table('quicksnacks.customer_detailll')->where('email', $email)->first();
        if ($chek) {
            Session::put('erros', 'Email already exists');
            return back();
        } else {
            DB::insert('INSERT INTO quicksnacks.customer_detailll(username,address,email,password,phone) VALUES (?,?,?,?,?)', [$username, $address, $email, md5($password), $phone]);
            Session::put('notifications',' Register Success');
            return redirect()->action([UserControler::class, 'index']);
        }
    }
    //login client
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $login = DB::table('quicksnacks.customer_detailll')->where('email', $email)->where('password', md5($password))->first();

        if ($login) {
            Session::put('id_user', $login->ID_user);

            return redirect()->action([HomeController::class, 'healthy']);
        } else {
            Session::put('fail', 'Incorrect email or password!');
            return back();
        }
    }
    //email
    public function sendmail(Request $request)
    {
        $emaill = DB::table('quicksnacks.customer_detailll')->where('email', $request->input('email'))->first();
        if ($emaill) {
            mail::send('client.sendmail', compact('emaill'), function ($email) use ($emaill) {
                $email->from('nguyentrungviet13032003@gmail.com', 'QuickSnack');
                $email->to($emaill->email, 'toi');
            });
            return redirect()->action([UserControler::class, 'index']);
        } else {
            session::put('f', 'wrong email ');
            return back();
        };
    }
    //logout
    public function logout()
    {
        $this->authLogin();
        session::put('id_user', null);
        return redirect()->action([HomeController::class, 'healthy']);
    }

    //profile
    public function profile()
    {
        $this->authLogin();
        $id = session::get('id_user');
        $profile = DB::select('SELECT*FROM quicksnacks.customer_detailll where ID_user=?', [$id]);
        return view('client.profile', ['profilee' => $profile]);
    }
    public function editprofile($i)
    {
        $this->authLogin();
        $edit = DB::select('select * from quicksnacks.customer_detailll where ID_user=?', [$i]);
        return view('client.editprofile', ['edits' => $edit]);
    }
    public function save(Request $request)
    {
        $name = $request->input('name');
        $address = $request->input('address');
        $password = $request->input('password');
        $phone = $request->input('phone');
        DB::update('update  quicksnacks.customer_detailll set username=?, address=?,password=?, phone=? where ID_user=?', [$name, $address, md5($password), $phone, Session::get('id_user')]);
        return redirect()->action([UserControler::class, 'profile']);
    }
    // newpass
    public function newpass($mail)
    {

        return view('client.newpass', ['phong' => $mail]);
    }
    public function savepass(Request $request, $phong)
    {
        $new = $request->input('newpass');
        DB::update('update  quicksnacks.customer_detailll set password=? where email=?', [md5($new), $phong]);
        return redirect()->action([UserControler::class, 'index']);
    }
}
