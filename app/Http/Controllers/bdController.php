<?php
/**
 * Created by PhpStorm.
 * User: arakul
 * Date: 26.06.2018
 * Time: 16:43
 */

namespace App\Http\Controllers;


use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class bdController extends Controller
{

    public function deleteProduct(Request $request)
    {
        $product = DB::table('product')->where("id", $request->productId)->delete();
        return redirect()->route('add');
    }


}