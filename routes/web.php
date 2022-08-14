<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CheckAdminLogin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\showSnackController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('send-message', [ContactController::class,'sendEmail'])->name('contact.send');
//admin comment
Route::get('/admin/comment',[CommentController::class,'index']);
Route::get('/admin/checkComment/{Id_comment}',[CommentController::class,'checkComment']);
Route::get('/admin/checkCommentNo/{Id_comment}',[CommentController::class,'checkCommentNo']);
Route::post('/admin/comment/delete',[CommentController::class,'commentDelete']);

Route::get('/admin/product/delete', [ProductController::class, 'productDelete']);
//admin forget password
Route::get('/admin/forgotPassword', [AdminController::class, 'forgotPassword']);
Route::get('/admin/newPassword/{mail}/{oldpass}', [AdminController::class, 'newPassword']);
Route::post('/admin/newPassword/save/{phong}', [AdminController::class, 'savePassword']);

//admin
Route::get('/admin/login',[AdminController::class,'login'])->name('login');
Route::post('/admin/check',[AdminController::class,'check_login']);
// Route::post('/admin/check',[CheckAdminLogin::class,'handle']);
Route::get('/admin/logout',[AdminController::class,'logout']);
//contact
Route::get('/contact',[ContactController::class,'create']);
Route::get('/client/contact',[ContactController::class, 'index']);

//phong
//oder
//admin
Route::get('/admin/order',[OrderController::class, 'index']);
Route::post('/admin/order/access',[OrderController::class, 'orderAccess']);
Route::get('/admin/accept/{id}',[OrderController::class, 'Browser']);
Route::get('/admin/no-accept/{id}',[OrderController::class, 'NoBrowser']);
//client
Route::get('/PurchaseHistory',[OrderController::class, 'PurchaseHistory']);
Route::get('/PurchaseHistorys',[OrderController::class, 'PurchaseHistorys']);
Route::get('/category/buy/{id}',[OrderController::class, 'categoryBuy']);
//search
Route::get('/search',[SearchController::class,'search']);
Route::get('/search/product',[SearchController::class,'searchClient']);
//phongend

Route::get('/admin/delete-category/{ID_category}', [CategoryController::class, 'destroy']);
Route::get('/admin/edit-category/{ID_category}', [CategoryController::class, 'edit']);
Route::get('/admin/update-category/{ID_category}', [CategoryController::class, 'update']);
Route::get('/admin/delete-product/{ID_product}', [ProductController::class, 'destroy']);
Route::get('/admin/edit-product/{ID_product}', [ProductController::class, 'edit']);
Route::post('/admin/update-product/{ID_product}', [ProductController::class, 'update']);
Route::get('/admin/category/{Name}', [ProductController::class, 'category']);
Route::middleware([CheckAdminLogin::class])->group(function(){
    Route::get('/admin/profile', [AdminController::class, 'profile']);
    Route::get('/admin/edit-profile', [AdminController::class, 'editProfile']);
    Route::get('/admin/update', [AdminController::class, 'updateProfile']);
    Route::get('/admin/search/user',[SearchController::class,'adminSearchUser']);

    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/user-management',[AdminController::class, 'usermanagement']);
    Route::get('/admin/post_management',[ProductController::class, 'post']);
    Route::get('/admin/contact',[ContactController::class, 'contact']);
    Route::post('/admin/send-contact',[ContactController::class, 'sendcontact']);
    Route::get('/admin/comment',[CommentController::class,'index']);
    Route::get('/admin/order',[OrderController::class, 'index']);

    // Route::get('/admin/snacks-for-kids', [ProductController::class, 'kids']);
    // Route::get('/admin/easy-on-stomach-snacks', [ProductController::class, 'stomach']);
    // Route::get('/admin/smoothies', [ProductController::class, 'smoothies']);

    //insert category
    Route::get('/admin/insert-category', [CategoryController::class, 'create']);
    Route::post('/admin/add-category', [CategoryController::class, 'store']);
    Route::get('/admin/category', [CategoryController::class, 'index']);

    // insert product
    Route::get('/admin/insert-product', [ProductController::class, 'create']);
    Route::post('/admin/add-product', [ProductController::class, 'store']);
    Route::get('/admin/product', [ProductController::class, 'index']);


    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');
    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');
 //seach
    Route::get('/admin/product/search',[SearchController::class,'searchProduct']);
    Route::get('/admin/order/search',[SearchController::class,'a']);
});


//viet
//login user
route::get('/client/login',[UserControler::class,'index']);
route::post('/login',[UserControler::class,'login']);


//register user
Route::get('/client/register',[UserControler::class,'clientregister']);
route::get('/register',[UserControler::class,'store']);

//email
route:: get('/sendemail',[UserControler::class,'sendmail']);
route::get('/newpass/{mail}/{oldpass}',[UserControler::class,'newpass']);
route::get('/savepass/{phong}',[UserControler::class,'savepass']);

// logout
route::get('/logout',[UserControler::class,'logout']);

//hơme san pham show
route::get('/',[HomeController::class,'healthy']);

//show san pham chi tiet
route::get('/show/{id}',[HomeController::class,'show']);

//show san pham danh muc
route::get('/all-snacks',[showSnackController::class,'all']);
route::get('/category/{category}',[showSnackController::class,'category']);


//profile
route::get('/profile',[UserControler::class,'profile']);
route::get('/editprofile/{i}',[UserControler::class,'editprofile']);
route::get('/save',[UserControler::class,'save']);


//comment user
Route::post('/comment',[HomeController::class,'up']);




