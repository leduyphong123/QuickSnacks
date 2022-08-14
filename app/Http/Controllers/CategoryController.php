<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class CategoryController extends Controller
{
    public function __construct(){
        $cates=DB::table('quicksnacks.categoryyy')->get();
        View::share('cates',$cates);
    }
    public function authLogin(){
        $chk = DB::table('quicksnacks.adminnn')->where('admin_username',Session::get('admin_username'))->where('password',Session::get('password'))->first();
        if($chk) {
            return Redirect::to('/admin/edit-category/{ID_category}');
            return Redirect::to('/admin/update-category/{ID_category}');
            return Redirect::to('/admin/delete-category/{ID_category}');
        } else {
            return Redirect::to('/admin/login')->send();
        }
    }
    public function index()
    {
        //
        $category=DB::select('SELECT * FROM quicksnacks.categoryyy');
        return view('admin.view_category',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
                $name = $request->input('inputCategory');
                DB::insert('INSERT INTO quicksnacks.categoryyy (NameCategory) VALUES (?)', [$name]);
            DB::commit();
            Session()->flash('success', 'Insert category success.');
            return redirect()->action([CategoryController::class,'create']);
            // return redirect()->action([CategoryController::class,'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->authLogin();
        $category=DB::select('SELECT * FROM quicksnacks.categoryyy WHERE ID_category = ?',[$id]);
        return view('admin.update_category',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->authLogin();
        $id=$request->input('inputID');
        $name=$request->input('inputCategory');
        DB::update('UPDATE quicksnacks.categoryyy set ID_category=?, NameCategory = ? where ID_category = ?',[$id,$name,$id]);
        return redirect()->action([CategoryController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->authLogin();
        DB::delete('DELETE FROM quicksnacks.product_detailll WHERE ID_category = ?',[$id]);
        DB::delete('DELETE FROM quicksnacks.categoryyy WHERE ID_category = ?',[$id]);
        return redirect()->action([CategoryController::class,'index']);
    }
}
