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
                    <h2>Add New Categories</h2>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            Image :
                            <input type="file" name="image" onchange="readURL(this)" class="choose" />
                            <img id="blah" width="90" height="100" src="" alt="">
                            <!--<img src="{/{asset('storage/Category' . $category->image)}}" width="100" height="100" alt="">-->
                        </div>
                        <div class="form-group">
                            Name :
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            Scientific Name :
                            <input type="text" name="scientific" class="form-control">
                        </div>
                        <div class="form-group">
                            Category :
                            <select name="category" id="" class="form-control">
                                <option value=""></option>
                                <option value="Flora">Flora</option>
                                <option value="Fauna">Fauna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            Since Time :
                            <select name="since" id="" class="form-control">
                                <option value=""></option>
                                <option value="Azoikum">Azoikum</option>
                                <option value="Paleozoikum">Paleozoikum</option>
                                <option value="Mesozoikum">Mesozoikum</option>
                                <option value="Neozoikum">Neozoikum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            Species :
                            <input type="text" name="species" class="form-control">
                        </div>
                        <div class="form-group">
                            Type :
                            <select name="type" id="" class="form-control">
                                <option value=""></option>
                                <option value="Herbivora">Herbivora</option>
                                <option value="Karnivora">Karnivora</option>
                                <option value="Omnivora">Omnivora</option>
                                <option value="FLORA">FLORA</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-warning">
                                <a href="{{route('category.index')}}">
                                    Back
                                </a>
                            </button>
                            <button type="submit" class="btn btn-info">
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
