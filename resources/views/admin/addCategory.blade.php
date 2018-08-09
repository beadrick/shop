@extends('layouts.menu')
@section('content')

        <!DOCTYPE html>
<html>
<head>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>

    <title>Админка</title>
    <script>

        function sendProd() {

            var name = document.getElementById('fileInput');
            var nameProduct = document.getElementById('prodName').value;
            var price = document.getElementById('prodPrice').value;
            var category = document.getElementById('prodCategory').value;
            var nameImage = name.files.item(0).name;

            $.ajax({

                type: "POST",
                url: "addProd",
                data: {
                    '_token': "{{csrf_token()}}",
                    "nameProduct": nameProduct,
                    "price": price,
                    "category": category,
                    "fileName": nameImage
                },

                success: function (result) {
                    alert(result);
                },

                error: function (xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })
        }


    </script>
</head>
<body>


<div class="container" style="padding: 2px">
    <form action={{url('/addCat')}} method="post" class="col-lg-3">
        <label><h3>Добавить категорию</h3></label>

        <label for="categoryName">Название категории</label><br>
        <input id="categoryName" name="categoryName" class="form-control input-sm" onchange="validateCategoryName()"
               required>
        <div id="warningMessage" class="alert-warning" style="display: none"><br>
            <h5>Введите минимум 5 символов</h5>
        </div>
        <input type="submit" value="Добавить" id="sendCategory" class="btn btn-primary">
        {{ csrf_field() }}
    </form>


    <form action={{url('/addProd')}} method="post" class="col-lg-3" id="formProduct">
        <label><h3>Добавить товар</h3></label><br>

        <label for="prodName">Название товара</label><br>
        <input name="prodName" id="prodName" class="form-control input-sm" required><br>
        <label for="prodPrice">Стоимость товара</label><br>
        <input name="prodPrice" id="prodPrice" class="form-control input-sm" pattern="^[ 0-9]+$" required><br>
        <label for="prodCategory">Категория товара</label><br>
        <select name="prodCategory" id="prodCategory" class="form-control" required>
            @foreach($category as $cat)
                <option name={{$cat->name}} value= {{$cat->id}}>{{$cat->name}}</option>
            @endforeach
        </select><br>
        <input type="file" id="fileInput">
        <input type="button" value="Добавить" class="btn btn-primary" onclick="sendProd()">
        {!! csrf_field() !!}
    </form>


    <form action={{url('/deleteProd')}} method="post" class="col-lg-3" id="formProduct">
        <label><h3>Удалить товар</h3></label>
        <label>Название товара</label>
        <select class="form-control input-sm" name="productId" required>
            @foreach($product as $prod)
                <option name={{$prod->name}} value= {{$prod->id}}>{{$prod->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Удалить товар" class="btn btn-primary">

        {!! csrf_field() !!}

    </form>


    <form action={{url('/deleteCategory')}} method="post" class="col-lg-3" id="formDeleteCat">
        <label><h3>Удалить категорию</h3></label>
        <label>Название категории</label>
        <select class="form-control input-sm" name="productId" required>
            @foreach($category as $cat)
                <option name="deleteCat" value= {{$cat->id}}>{{$cat->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Удалить категорию" class="btn btn-primary">

        {!! csrf_field() !!}
    </form>


    <form action={{url('/addPostOffice')}} method="post" class="col-lg-3" id="formAddPost">
        <label><h3>Добавить почтовое отделение</h3></label>
        <label for="postOfficeName">Название отделения</label>
        <input id="postOfficeName" name="postOfficeName" class="form-control input-sm" required>

        <label for="postOfficeAddress">Адрес отделения</label>
        <input id="postOfficeAddress" name="postOfficeAddress" class="form-control input-sm" required>


        <label>Координаты для карты</label><br>
        <label for="postOfficeLat">Широта</label>
        <input id="postOfficeLat" name="postOfficeLat" class="form-control input-sm" required>
        <label for="postOfficeLng">Длина</label>
        <input id="postOfficeLng" name="postOfficeLng" class="form-control input-sm" required>
        <label for="postOfficeTimeWorking">Время работы</label>
        <input id="postOfficeTimeWorking" name="postOfficeTimeWorking" class="form-control input-sm" required>

        <input type="submit" value="Добавить отделение" class="btn btn-primary">

        {!! csrf_field() !!}
    </form>


</div>
</body>
@stop
</html>