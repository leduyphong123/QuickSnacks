<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class showSnackController extends Controller
{
    //shere view
    public function __construct(){
        $cates=DB::table('quicksnacks.categoryyy')->get();
        View::share('cates',$cates);
    }
    //
    public function all()
    {
        $all = DB::table('quicksnacks.product_detailll')->simplePaginate(6);
        return view('client.showSnack', ['items' => $all]);
    }
    public function category($category){
        $nameCategory=str_replace('-',' ',$category);
        $idCategory=DB::table('quicksnacks.categoryyy')->where('NameCategory',$nameCategory)->first();
        $all = DB::table('quicksnacks.product_detailll')->where('ID_category',$idCategory->ID_category)->simplePaginate(6);
        return view('client.showSnack', ['items' => $all]);
    }
}
