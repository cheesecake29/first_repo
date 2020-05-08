@extends('product.layout')

@section('content')

<div class="row">
<br><br><br> 
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>View Product Details</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('product.index') }}">Back</a>
        </div>
    </div>

</div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name: </strong>
                {{ $tbl_product->product_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Code: </strong>
                {{ $tbl_product->product_code }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details: </strong>
                {{ $tbl_product->details }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Image: </strong>
                <img src="{{ URL::to($tbl_product->logo) }}" height="150px;" width="150px;">
            </div>
        </div>
    </div>

@endsection