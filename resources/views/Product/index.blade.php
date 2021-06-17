@extends('layouts.nav')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>
            {{$message}}
        </p>
    </div>
@endif
    <div class="container">
        <h1 align="center">
            <strong>List Product</strong>
        </h1> <br>

        <a href="{{route('product.create')}}" class="btn btn-info">
            Add New Product
        </a> <br><br>

        <table class="table table-bordered table-stripped">
            <tr>
                <th>No : </th>
                <th>Code : </th>
                <th>Name : </th>
                <th>Netto : </th>
                <th>Stock : </th>
                <th>Price : </th>
                <th>Expired : </th>
                <th>Action : </th>
            </tr>
            @php
                $i = 1;
            @endphp

            @foreach ($data_product as $product)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->netto}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->expired}}</td>
                    <td>
                        <a href="{{route('product.edit', $product->id)}}" class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{route('product.destroy', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>

@endsection
