<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\SESSION;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class OrderController extends Controller
{
    public function __construct(){
        $cates=DB::table('quicksnacks.categoryyy')->get();
        View::share('cates',$cates);
    }
    public function authLoginClient()
    {
        $re = Session::get('id_user');
        if ($re) {
            return Redirect::to('/profile');
        } else {
            return Redirect::to('/client/login')->send();
        }
    }
    public function authLogin(){
        $chk = DB::table('quicksnacks.adminnn')->where('admin_username',Session::get('admin_username'))->where('password',Session::get('password'))->first();
        if($chk) {
            return Redirect::to('/admin/accept/{id}');
            return Redirect::to('/admin/no-accept/{id}');
        } else {
            return Redirect::to('/admin/login')->send();
        }
    }
    //admin order
    public function index(){
        $order = DB::table('quicksnacks.ordersss')->join('quicksnacks.customer_detailll','customer_detailll.ID_user','=',
        'ordersss.Id_user')->join('quicksnacks.product_detailll','product_detailll.ID_product','=',
        'ordersss.Id_product')->orderByDesc('ordersss.Id_order')
        ->simplePaginate(10);

        return view('admin.view_order',['order'=>$order]);
    }
    public function Browser($id){
        $this->authLogin();
        DB::update('UPDATE quicksnacks.ordersss set payment=? where Id_order = ?',[1,$id]);
        return redirect()->back();
    }
    public function NoBrowser($id){
        $this->authLogin();
        DB::update('update quicksnacks.ordersss set payment=? where Id_order=?',[null,$id]);
        return redirect()->back();
    }

    //client order
    public function PurchaseHistorys(){
        if(Session::get('id_user')){
            DB::insert('insert into quicksnacks.ordersss (ID_user,ID_product) values (?,?)',[Session::get('id_user'),Session::get('ID_product')]);

            Session::put('notification','Payment success');
        }
        return redirect()->action([OrderController::class, 'PurchaseHistory']);

    }
    public function PurchaseHistory(){
        $order = DB::table('quicksnacks.ordersss')->join('quicksnacks.customer_detailll','customer_detailll.ID_user','=',
        'ordersss.Id_user')->join('quicksnacks.product_detailll','product_detailll.ID_product','=',
        'ordersss.Id_product')->where('ordersss.ID_user',Session::get('id_user'))
        ->get();
        return view('client.purchase_history',['order'=>$order]);

    }
    public function categoryBuy($id){
        $this->authLoginClient();
        $show = DB::table('quicksnacks.product_detailll')->where('ID_product', [$id])->get();
        $comes = DB::table('quicksnacks.commentt')->where('Accept',1)->where('ID_product', $id)->orderByDesc('Day')->paginate(10);
        if(Session::get('id_user')){
        $comess = DB::table('quicksnacks.commentt')->where('ID_product', Session::get('ID_product'))->where('ID_user',Session::get('id_user'))->where('Accept',null)->orderByDesc('Day')->first();
        Session::put('virtual',$comess);
        }

        return view('client.categoryBuy', ['show' => $show,'comes' => $comes]);
    }

    public function orderAccess(Request $request){
        $id=$request->ids;
        foreach($id as $i){
            DB::update('update quicksnacks.ordersss set payment=? where Id_order=?',[1,$i]);
        }
        return redirect()->back();
    }
}
