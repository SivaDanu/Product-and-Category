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
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>OOPS!</strong> There Were Some Problems With Your Input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Product</h2>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.update', $product->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            Image :
                            <input type="file" name="image" value="{{$product->image}}" class="form-control">
                            <img src="{{asset('storage/Product' . $product->image)}}" width="100" height="100" alt="">
                        </div>
                        <div class="form-group">
                            Code :
                            <input type="text" name="code" value="{{$product->code}}" class="form-control">
                        </div>
                        <div class="form-group">
                            Name :
                            <input type="text" name="name" value="{{$product->name}}" class="form-control">
                        </div>
                        <div class="form-group">
                            Netto :
                            <input type="text" name="netto" value="{{$product->netto}}" class="form-control">
                        </div>
                        <div class="form-group">
                            Stock :
                            <input type="number" name="stock" value="{{$product->stock}}" class="form-control">
                        </div>
                        <div class="form-group">
                            Price :
                            <input type="number" name="price" value="{{$product->price}}" class="form-control">
                        </div>
                        <div class="form-group">
                            Expired :
                            <input type="date" name="expired" value="{{$product->expired}}" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">
                                <a href="{{route('product.index')}}" class="text-white">
                                    Back
                                </a>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
