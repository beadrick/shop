<?php

namespace App\Http\Controllers;

use App\postOffice;
use App\product;
use Illuminate\Http\Request;
use App\category;

class addOperationController extends Controller
{
    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'categoryName' => 'required||min:5',
        ]);

        $category = new category();
        $category->name = $request->categoryName;
        $category->save();
        return redirect('add');
    }

    public function addProduct(Request $request)
    {

        $product = new product();
        $product->name = $request->nameProduct;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->image = "..\..\public\img\\" . $request->fileName;
        $product->save();
        return redirect('add');

    }


    public function deleteCategory(Request $request)
    {
        $category = category::all()->where("id", $request->productId)->first();
        $category->delete();
        return redirect('add');

    }

    public function addPostOffice(Request $request)
    {

        $postOffice = new postOffice();
        $postOffice->name = $request->postOfficeName;
        $postOffice->address = $request->postOfficeAddress;
        $postOffice->lat = $request->postOfficeLat;
        $postOffice->lng = $request->postOfficeLng;
        $postOffice->working_time = $request->postOfficeTimeWorking;
        $postOffice->save();
        return redirect('add');


    }


}
