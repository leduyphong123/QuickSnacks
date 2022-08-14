<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\SESSION;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    //shere view
    public function __construct()
    {
        $cates = DB::table('quicksnacks.categoryyy')->get();
        View::share('cates', $cates);
    }
    //show san pham home
    public function healthy()
    {
        $i = DB::table('quicksnacks.categoryyy')->count();
        for ($x = 1; $x <= $i; $x++) {
            $y = DB::table('quicksnacks.product_detailll')->where('ID_category', [$x])->paginate(2);
            $items[$x] = $y;
        }
        return view('client.homepage', compact('items'));
    }
    public function show($id)
    {
        $show = DB::table('quicksnacks.product_detailll')->where('ID_product', [$id])->get();

        Session::put('ID_product', $id);
        $comes = DB::table('quicksnacks.commentt')->join('quicksnacks.customer_detailll', 'customer_detailll.ID_user', '=', 'commentt.ID_user')->where('Accept', 1)->where('ID_product', $id)->orderByDesc('Day')->paginate(10);


        return view('client.show', ['show' => $show, 'comes' => $comes]);
    }
    public function up(Request $request)
    {
        $show = "";
        //lay name client

        //ajax
        if ($request->comment != null) {
            DB::insert('insert into quicksnacks.commentt (ID_product,ID_user,Comment) values (?,?,?)', [Session::get('ID_product'), Session::get('id_user'), $request->comment]);
            $comes = DB::table('quicksnacks.commentt')->join('quicksnacks.customer_detailll', 'customer_detailll.ID_user', '=', 'commentt.ID_user')->where('ID_product', Session::get('ID_product'))->where('Accept', 1)->orderByDesc('Day')->paginate(10);
            $comess = DB::table('quicksnacks.commentt')->where('ID_user', Session::get('id_user'))->where('ID_product', Session::get('ID_product'))->orderByDesc('Day')->first();
            $user = DB::table('quicksnacks.customer_detailll')->where('ID_user', Session::get('id_user'))->first();
            Session::put('ID_product', null);
            // lay comment ao cho nguoi dung
            $show .= '<div class="d-flex flex-row p-3 border-bottom">' .
                '<div class="w-100">' .
                '<div class="d-flex justify-content-between align-items-center">' .
                '<div class="d-flex flex-row align-items-center">' .
                '<span class="mr-2" id="Name">' . $user->username . '</span>'
                . '<small class="c-badge"></small>' .
                '</div>'
                . '<small>' . date('d-m-Y', strtotime($comess->Day)) . '</small>' .
                '</div>'
                . '<p class="text-justify comment-text mb-0">' . $comess->Comment . '</p>'
                . '</div>' .
                '</div>';
            foreach ($comes as $come) {
                $show .= '<div class="d-flex flex-row p-3 border-bottom">' .
                    '<div class="w-100">' .
                    '<div class="d-flex justify-content-between align-items-center">' .
                    '<div class="d-flex flex-row align-items-center">' .
                    '<span class="mr-2" id="Name">' . $come->username . '</span>'
                    . '<small class="c-badge"></small>' .
                    '</div>'
                    . '<small>' . date('d-m-Y', strtotime($come->Day)) . '</small>' .
                    '</div>'
                    . '<p class="text-justify comment-text mb-0">' . $come->Comment . '</p>'
                    . '</div>' .
                    '</div>';
            }
            return response()->json($show);
        }
    }
}
