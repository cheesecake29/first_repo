@extends('product.layout')

@section('content')

<div class="row">
<br><br><br> 
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('product.index') }}">Back</a>
        </div>
    </div>

</div>

<form action="{{ url('update/product/'.$tbl_product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Name: </strong>
                <input type="text" name="product_name" class="form-control"
                    value="{{ $tbl_product->product_name }}">
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Product Code: </strong>
                <input type="text" name="product_code" class="form-control"
                    value="{{ $tbl_product->product_code }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details: </strong>
                <textarea class="form-control" name="details" style="height: 160px">
                {{ $tbl_product->details }}
                </textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>New Product Image: </strong>
                <input type="file" name="logo" class="form-group">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Old Product Image: </strong>
                <img src="{{ URL::to($tbl_product->logo) }}" height="70px;" width="80px;">
                <input type="hidden" name="old_logo" class="form-group" value="{{ $tbl_product->logo }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </div>
        
    </form>

@endsection