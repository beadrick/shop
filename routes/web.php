<?php

use App\Http\Controllers\getInfoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/auth', function () {
    return view('auth/login');
});


Route::get('/shop', function () {
    return view('cart');
});

Route::get('/singleProduct', function () {
    return view('single-product');
})->middleware('auth');

Route::get('/checkout', function () {
    return view('checkout');
})->middleware('auth');

Route::get('/category', function () {

    $category = DB::table('category')->get();
    return view('category', compact('category'));
})->middleware('auth');

Route::get('/add', function () {
    $model = new getInfoController();
    $category = $model->getCategory();
    $product = $model->getProduct();
    return view('admin/addCategory', compact("category", "product"));
})->name("add");

Route::post('/addCat', "addOperationController@addCategory");
Route::post('/addProd', "addOperationController@addProduct");
Route::post('/selectProduct', "getInfoController@getProductFromCategory");
Route::post('/deleteProd', "bdController@deleteProduct");
Route::post('/deleteCategory', "addOperationController@deleteCategory");
Route::post('/addToCart', "AjaxController@addProduct");
Route::post('/getIdArray', "getInfoController@getIdArray");
Route::post('/deleteFromCart', "AjaxController@deleteFromCart");
Route::post('/addPostOffice', "addOperationController@addPostOffice");


Route::get('/cartProduct', function () {
    if (empty(session("idProduct"))) {
        $idArray = array();
    } else {
        $idArray = session("idProduct");
    }

    $getProduct = new getInfoController();
    $countOfProd = array_count_values($idArray);

    $idArray = array_unique($idArray);
    $fullProdInfo = $getProduct->getProductFull($idArray);
    return view('cartProduct', compact("fullProdInfo", "countOfProd"));

});


Route::get("/ordering", function () {

    $postOffice = new getInfoController();
    $listOffice = $postOffice->getPostOffice();
    return view("ordering", compact("listOffice"));

});

Route::post('/postOfficeMap', "getInfoController@getPostOffice");
Route::post('/postOfficeForMap', "getInfoController@getPostOfficeForMap");





