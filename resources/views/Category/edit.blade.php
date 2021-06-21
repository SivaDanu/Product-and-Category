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
                    <h2>Edit Category</h2>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.update', $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            Image :
                            <input type="file" name="image" class="form-control" value="{{$category->image}}">
                            <img src="{{asset('storage/Category' . $category->image)}}" width="100" height="100" alt="">
                        </div>
                        <div class="form-group">
                            Name :
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                            Scientific Name :
                            <input type="text" name="scientific" class="form-control" value="{{$category->scientific}}">
                        </div>
                        <div class="form-group">
                            Category :
                            <select name="category" id="" class="form-control" value="{{$category->category}}">
                                <option value="{{$category->category}}">{{$category->category}}</option>
                                <option value="Flora">Flora</option>
                                <option value="Fauna">Fauna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            Since Time :
                            <select name="since" id="" class="form-control" value="{{$category->since}}">
                                <option value="{{$category->since}}">{{$category->since}}</option>
                                <option value="Azoikum">Azoikum</option>
                                <option value="Paleozoikum">Paleozoikum</option>
                                <option value="Mesozoikum">Mesozoikum</option>
                                <option value="Neozoikum">Neozoikum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            Species :
                            <input type="text" name="species" class="form-control" value="{{$category->species}}">
                        </div>
                        <div class="form-group">
                            Type :
                            <select name="type" id="" class="form-control" value="{{$category->type}}">
                                <option value="{{$category->type}}">{{$category->type}}</option>
                                <option value="Herbivora">Herbivora</option>
                                <option value="Karnivora">Karnivora</option>
                                <option value="Omnivora">Omnivora</option>
                                <option value="FLORA">FLORA</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">
                                <a href="{{route('category.index')}}" class="text-white">
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
