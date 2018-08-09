<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Foundation\Testing\Constraints\PageConstraint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{


    public function save(Request $post)
    {
        $hello = "Привет" . $post['mname'];
        return response()->json($hello);
    }


    function addProduct(Request $post)
    {
        $result = array();
        $price = $post->input("price");

        session(["price" => session("price") + $price]);
        $id = $_POST["idProd"];
        $post->session()->push("idProduct", $id);

        $count = session("count");

        session(["count" => ++$count]);
        $result = array(session("count"), session("price"));
        $post->session()->flash("productAddToCart", "Товар добавлен в корзину");
        $json = json_encode($result);
        echo $json;
    }

    function deleteFromCart(Request $post)
    {
        $countArray = session("countArray");
        var_dump($countArray);
        $id = $post->input("id");
        $price = $post->input("price");
        $totalPrice = session("price");
        $count = session("count");
        $currentPrice = intval($totalPrice) - intval($price);
        $countArray[$id] = $countArray[$id] - 1;

        session(["price" => $currentPrice]);
        session(["count" => $count - 1]);


        session(["countArray" => $countArray]);
        var_dump(session("countArray"));
        $countArray = array(session("countArray"));
        $json = json_encode($countArray);
        echo $json;
    }


}


