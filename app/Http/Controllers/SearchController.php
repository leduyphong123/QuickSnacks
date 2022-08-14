<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Php;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{
    public function __construct()
    {
        $cates = DB::table('quicksnacks.categoryyy')->get();
        View::share('cates', $cates);
    }

    public function searchProduct(Request $request)
    {
        $a = DB::table('quicksnacks.categoryyy')->count();
        for ($x = 1; $x <= $a; $x++) {
            if (Session::get('idCategory') == $x) {
                if ($request->ajax()) {
                    $output = '';
                    $upload = asset('uploads/');
                    $products = DB::table('quicksnacks.product_detailll')->where('NameProduct', 'LIKE', '%' . $request->search . '%')->where('ID_category', $x)->get();
                    if ($products) {
                        $i = 1;
                        foreach ($products as $product) {
                            $Ingredient = html_entity_decode($product->Ingredient);
                            $CookingRecipe = html_entity_decode($product->CookingRecipe);
                            $output .= '<tr>
                            <td><input type="checkbox" name="ids['.$product->ID_product.']" value="'.$product->ID_product.'" class="checkbox"></td>
                            <td>' . $i++ . '</td>
                                <td>' . $product->NameProduct . '</td>
                                <td><img src="' . $upload . '/' . $product->ImageProduct . '" style="width: 100px; height: 100px"></td>
                                <td>' . $Ingredient . '</td>
                                <td>' . $CookingRecipe . '</td>
                                <td>' . $product->Calories . '</td>
                                <td>' . $product->Description . '</td>
                                <td><a href="/admin/edit-product/' . $product->ID_product . '"class="btn btn-success">Edit</a></td>
                                <td><a href="/admin/delete-product/' . $product->ID_product . '"class="btn btn-danger">Delete</a></td>
                                </tr>';
                        }
                    }
                    return Response($output);
                }
            }
        }
    }
    //search client product
    public function search()
    {
        $all = DB::table('quicksnacks.product_detailll')->paginate(9);
        return view('client.search_product_clients', ['items' => $all]);
    }

    public function searchClient(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $upload = asset('uploads/');
            $products = DB::table('quicksnacks.product_detailll')->where('NameProduct', 'LIKE', '%' . $request->search . '%')->paginate(6);
            if ($products) {
                foreach ($products as $product) {
                    $output .= '<div class="col-12 col-sm-6 col-md-4 p-2 border border-light">
                        <img src="' . $upload . '/' . $product->ImageProduct . '" class="card-img-top"
                            style="max-height: 13rem"alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $product->NameProduct . '</h5>
                            <p class="card-text">' .
                        html_entity_decode($product->Description)
                        . '</p>
                            <a href="/show/' . $product->ID_product . '" class="btn btn-primary">View</a>
                        </div>
                    </div>';
                }
            }
            return Response($output);
        }
    }
    //search oder
    public function a(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $a = $request->search;
            $order = DB::table('quicksnacks.ordersss')->join(
                'quicksnacks.customer_detaill',
                'customer_detaill.ID_user',
                '=',
                'orderss.Id_user'
            )->join(
                'quicksnacks.product_detaill',
                'product_detaill.ID_product',
                '=',
                'orderss.Id_product'
            )->where('Id_order', 'LIKE', '%' . $request->search . '%')->paginate(6);
            if ($order) {
                $i = 1;
                foreach ($order as $orde) {
                    $output .= '<tr>
                    <td><input type="checkbox" name="ids['.$orde->Id_order.']" value="'.$orde->Id_order.'" class="checkbox"></td>
                        <td>
                            ' . $i++ . '
                        </td>
                        <td>
                            ' . $orde->username . '
                        </td>
                        <td>
                            ' . $orde->NameProduct . '
                        </td>
                        <td>
                            ' . $orde->Price . '
                        </td>';
                    if ($orde->payment) {
                        $output .= '<td class="text-center">
                            <a href="/admin/no-accept/' . $orde->Id_order . '" class="btn btn-danger">No Accept</a>
                        </td>';
                    } else {
                        $output .= '<td class="text-center">
                            <a href="/admin/accept/' . $orde->Id_order . '" class="btn btn-success">Accept</a>
                        </td>';
                    }
                    $output .= '</tr>';
                }
            }
            return Response($output);
        }
    }
    public function adminSearchUser(Request $request){
        if ($request->ajax()) {
            $output = '';
            $users = DB::table('quicksnacks.customer_detailll')->where('email', 'LIKE', '%' . $request->search . '%')->paginate(6);
            if ($users) {
                $i=1;
                foreach ($users as $item) {
                    $output .= '<tr>
                    <td>
                        '.$i++.'
                    </td>
                    <td>'. $item->username.'
                    </td>
                    <td>'.$item->address.'
                    </td>
                    <td>'.$item->email .'
                    </td>
                    <td>'.$item->phone.'</td>
                </tr>';
                }
            }
            return Response($output);
        }
    }
}
