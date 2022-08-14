<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\View;


class CommentController extends Controller
{
    public function __construct(){
        $cates=DB::table('quicksnacks.categoryyy')->get();
        View::share('cates',$cates);
    }
    //
    public function index(){
        $comes = DB::table('quicksnacks.commentt')->join('quicksnacks.product_detailll','commentt.ID_product','=','product_detailll.ID_product')
        ->join('quicksnacks.customer_detailll','customer_detailll.ID_user','=','commentt.ID_user')
        ->orderByDesc('Day')->simplePaginate(10);
        return view('admin.view_comment',['comes'=>$comes]);
    }
    public function checkComment($id){
        DB::beginTransaction();
            DB::update('UPDATE quicksnacks.commentt set Accept = ? where Id_comment = ?',[1,$id]);
        DB::commit();
        return redirect()->action([CommentController::class,'index']);

    }
    public function checkCommentNo($id){
        DB::beginTransaction();
            DB::update('UPDATE quicksnacks.commentt set Accept = ? where Id_comment = ?',[null,$id]);
        DB::commit();
        return redirect()->action([CommentController::class,'index']);

    }
    public function commentDelete(Request $request){
        DB::table('quicksnacks.commentt')->whereIn('Id_comment',$request->ids)->delete();
        return redirect()->back();
    }

}
