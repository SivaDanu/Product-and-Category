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
<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>
<body>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>
            {{$message}}
        </p>
    </div>
@endif
    <div class="container">
        <h1 align="center">
            <strong>Table Of Categories</strong>
        </h1> <br>

    <a href="{{route('category.create')}}" class="btn btn-info">
        Add New Category
    </a> <br><br>

    <table class="table table-bordered table-stripped">
        <tr>
            <th>No : </th>
            <th>Image : </th>
            <th>Name : </th>
            <th>Scientific Name : </th>
            <th>Categories : </th>
            <th>Since Time : </th>
            <th>Species : </th>
            <th>Type : </th>
            <th>Action : </th>
        </tr>
        @php
            $i = 1;
        @endphp

        @foreach ($data_category as $category)
            <tr>
                <td>{{$i++}}</td>
                <td>
                    <img src="{{asset ('storage/Category/'. $category->image) }}" width="100" height="100" alt="" />
                </td>
                <td>{{$category->name}}</td>
                <td>{{$category->scientific}}</td>
                <td>{{$category->category}}</td>
                <td>{{$category->since}}</td>
                <td>{{$category->species}}</td>
                <td>{{$category->type}}</td>
                <td>
                    <a href="{{route('category.edit', $category->id)}}" class="btn btn-warning">
                        Edit
                    </a>

                    <form action="{{route('category.destroy', $category->id)}}" method="POST">
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

<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
@endsection
