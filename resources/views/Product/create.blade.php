@extends('Product.layout')

@section('content')
<div class="">
    <div class="">
        <div class="modal-header">
            <h2>Add New Product</h2>
        </div>
        <!--<div class="pull-right">
            <a href="{/{route('product.index')}}" class="btn btn-warning">
                Back
            </a>
        </div>-->
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>OOPS!</strong>There Were Some Problem With Your Input. <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('product.store')}}" method="POST">
    @csrf

    <div class="modal-body">
        <div class="">
            <div class="">
                <div class="form-group">
                    <strong>Code : </strong>
                    <input type="integer" name="code" class="form-control" placeholder="">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <strong>Name : </strong>
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <strong>Netto : </strong>
                    <input type="text" name="netto" class="form-control" placeholder="">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <strong>Stock : </strong>
                    <input type="integer" name="stock" class="form-control" placeholder="">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <strong>Price : </strong>
                    <input type="integer" name="price" class="form-control" placeholder="">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <strong>Expired : </strong>
                    <input type="date" name="expired" class="form-control" placeholder="">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning">
                    <a href="{{route('product.index')}}">
                        Back
                    </a>
                </button>
                <button type="submit" class="btn btn-info">
                    Submit
                </button>
            </div>
        </div>
    </div>
</form>

@endsection
