<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;


class ProductController extends Controller
{

    public function __construct(){
        $cates=DB::table('quicksnacks.categoryyy')->get();
        View::share('cates',$cates);
    }
    public function authLogin(){
        $chk = DB::table('quicksnacks.adminnn')->where('admin_username',Session::get('admin_username'))->where('password',Session::get('password'))->first();
        if($chk) {
            return Redirect::to('/admin/edit-product/{ID_product}');
            return Redirect::to('/admin/update-product/{ID_product}');
            return Redirect::to('/admin/edit-product/{ID_product}');
            return Redirect::to('/admin/category/{Name}');
        } else {
            return Redirect::to('/admin/login')->send();
        }
    }
    public function category($category){
        $this->authLogin();
        $nameCategory=str_replace('-',' ',$category);
        $idCategory=DB::table('quicksnacks.categoryyy')->where('NameCategory',$nameCategory)->first();
        Session::put('idCategory',$idCategory->ID_category);
        $all = DB::table('quicksnacks.product_detailll')->where('ID_category',$idCategory->ID_category)->simplePaginate(6);
        return view('admin.view_product', ['products' => $all]);
    }
    public function productDelete(Request $request){
        $this->authLogin();
        DB::table('quicksnacks.product_detailll')->whereIn('ID_product',$request->ids)->delete();
        return redirect()->back();
    }
    public function post()
    {
        $products=DB::table('quicksnacks.product_detailll')->simplePaginate(8);
        return view('admin.post_management',['products'=>$products]);
    }

// ===========
    public function index()
    {
        //
        $products=DB::table('quicksnacks.product_detailll')->simplePaginate(8);
        return view('admin.view_product',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=DB::select('SELECT * FROM quicksnacks.categoryyy');
        return view('admin.create_product',['category'=>$category]);
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
            if($request->input('inputPrice')){
                DB::beginTransaction();
                $name = $request->input('inputName');

                $image = time() . '_snacks' . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $image);

                $ingredient = $request->input('inputIngredient');
                $cookingRecipe = $request->input('inputCookingRecipe');
                $calories = $request->input('inputCalories');
                $IDcategory = $request->input('inputIDCategory');
                $introduce = $request->input('inputIntroduce');
                $description = $request->input('inputDescription');
                DB::insert('INSERT INTO quicksnacks.product_detailll (NameProduct,ImageProduct,Ingredient,CookingRecipe,Calories,Information,ID_category,Description,Price) VALUES (?,?,?,?,?,?,?,?,?)', [$name,$image,$ingredient,$cookingRecipe,$calories,$introduce,$IDcategory,$description,$request->input('inputPrice')]);
            DB::commit();
            Session()->flash('success', 'Insert product success.');
            return redirect()->action([ProductController::class,'create']);
            }else{
                DB::beginTransaction();
                $name = $request->input('inputName');

                $image = time() . '_snacks' . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $image);

                $ingredient = $request->input('inputIngredient');
                $cookingRecipe = $request->input('inputCookingRecipe');
                $calories = $request->input('inputCalories');
                $IDcategory = $request->input('inputIDCategory');
                $introduce = $request->input('inputIntroduce');
                $description = $request->input('inputDescription');
                DB::insert('INSERT INTO quicksnacks.product_detailll (NameProduct,ImageProduct,Ingredient,CookingRecipe,Calories,Information,ID_category,Description) VALUES (?,?,?,?,?,?,?,?)', [$name,$image,$ingredient,$cookingRecipe,$calories,$introduce,$IDcategory,$description]);
            DB::commit();
            Session()->flash('success', 'Insert product success.');
            return redirect()->action([ProductController::class,'create']);
            }

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
        $products=DB::select('SELECT * FROM quicksnacks.product_detailll WHERE ID_product = ?',[$id]);
        return view('admin.update_product',['products'=>$products]);
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
        $this->authLogin();
        DB::beginTransaction();
        $id = $request->input('inputID');
        $name = $request->input('inputName');

        if($request->hasFile('image')) {
            $image = time() . '_snacks' . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $image);
        } else {
            $products=DB::select('SELECT ImageProduct FROM quicksnacks.product_detailll WHERE ID_product = ?',[$id]);
            if ($products){
                foreach ($products as $product) {
                    $image = "$product->ImageProduct";
                    }
            }

        }
            $ingredient = $request->input('inputIngredient');
            $cookingRecipe = $request->input('inputCookingRecipe');
            $calories = $request->input('inputCalories');
            $IDcategory = $request->input('inputIDCategory');
            $introduce = $request->input('inputIntroduce');
            $description = $request->input('inputDescription');
            DB::update('UPDATE quicksnacks.product_detailll set ID_product = ?, NameProduct = ?,ImageProduct = ?,Ingredient = ?,
            CookingRecipe = ?,Calories = ?,Information = ?,ID_category = ?,Description = ? where ID_product = ?',[$id,$name,$image,$ingredient,$cookingRecipe,$calories,$introduce,$IDcategory,$description,$id]);
        DB::commit();
        return redirect()->action([ProductController::class,'index']);
    }


    public function destroy($id)
    {
        //
        $this->authLogin();
        DB::delete('DELETE FROM quicksnacks.commentt WHERE ID_product = ?',[$id]);
        DB::delete('DELETE FROM quicksnacks.product_detailll WHERE ID_product = ?',[$id]);
        return back()->withInput();
    }
}
