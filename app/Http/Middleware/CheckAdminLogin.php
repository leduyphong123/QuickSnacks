<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Http\Controllers\AdminController;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle(Request $request, Closure $next)
    {
        function checkReq($requestUrl){
            $isUrlAdmin = new Collection();
            $isUrlAdmin = collect(["/admin","/admin/user-management","/admin/post_management",
        "/admin/contact","/admin/feedback","/admin/send-contact","/admin/healthy-snacks","/admin/snacks-for-kids","/admin/easy-on-stomach-snacks",
        "/admin/smoothies","/admin/insert-category","/admin/add-category","/admin/category","/admin/delete-category",
        "/admin/edit-category","/admin/update-category","/admin/insert-product",
        "/admin/add-product","/admin/product","/admin/delete-product/","/admin/edit-product",
        "/admin/update-product","/admin/order","/admin/comment","/admin/profile","/admin/edit-profile","/admin/update",
        "/ckfinder/connector","/ckfinder/browser","/admin/search/user","/admin/product/search","/admin/order/search"]);
            $chk = false;
            foreach ($isUrlAdmin as $isUrl){
                if($requestUrl == $isUrl){
                    $chk = true;
                };
            }
            return $chk;
        }
        $admin=DB::table('quicksnacks.adminnn')->where('admin_username',Session::get('admin_username'))->where('password',Session::get('password'))->first();
        if($admin){
            $currentUrl=$request->getPathInfo();
            if(checkReq($currentUrl)==true){
                return $next($request);
            } else {
                return redirect()->action([AdminController::class,'login']);
            }
        } else {
            Session::put('messenger','Incorrect username or password.');
            return redirect()->action([AdminController::class,'login']);
        }
    }
}
