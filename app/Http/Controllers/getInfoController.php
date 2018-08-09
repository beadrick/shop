<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class getInfoController extends Controller
{
    public function getCategory()
    {

        $category = DB::table('category')->get();
        return $category;

    }

    public function getProductFromCategory(Request $request)
    {
        if (isset($request->query)) {
            $product = DB::table('product')->where("category", $request->categoryId)->get();
            return view('product', compact('product'));
        } else {
            $product = DB::table('product')->where("category", $request->categoryId)->get();
            return view('product', compact('product'));
        }
    }


    public function getProduct()
    {
        $product = DB::table('product')->get();
        return $product;

    }

    public function getIdArray()
    {
        $array = [session("idProduct")];
        $json = json_encode($array);
        echo $json;
    }


    public function getProductFull($idArray)
    {
        $product = array();
        var_dump($idArray);
        if (empty($idArray)) {
            return false;
        } else {
          foreach($idArray as $array){

                $result = DB::table('product')->select("id", "name", "price", "image")->where("id", $array)->get();
                array_push($product, $result);

            }
        }
        return $product;
    }


    public function getPostOffice()
    {

        $postOffice = DB::table('post_office')->get();
        return $postOffice;

    }

    public function getPostOfficeForMap(Request $request)
    {

        $postOffice = DB::table('post_office')->select("lat", "lng")->where("id", $request->id)->get();
        return $postOffice;

    }


}
