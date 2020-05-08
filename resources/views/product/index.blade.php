@extends('product.layout')

@section('content')

<div class="row">
<br><br><br> 
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product List</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('create.product') }}">Create New Product</a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success">
    <p> {{ $message }} </p>
</div>
@endif

<div class="row">
<table class="table table-bordered">
        <tr>
            <th> Product Name </th>
            <th> Product Code </th>
            <th> Product Details </th>
            <th> Product Logo </th>
            <th> Action </th>
        </tr>

        @foreach($tbl_product as $product)

        <tr>
        
            <td> {{ $product->product_name }} </td>
            <td> {{ $product->product_code }}</td>
            <td> {{ $product->details }}</td>
            <td><img src="{{ URL::to($product->logo) }}" height="70px;" width="80px;"></td>
            <td> 
                <a class="btn btn-info" href="{{ URL::to('view/product/'.$product->id) }}">View</a>
                <a class="btn btn-primary" href="{{ URL::to('edit/product/'.$product->id) }}">Edit</a>
                <a class="btn btn-danger" href="{{ URL::to('delete/product/'.$product->id) }}"
                        onclick="return confirm('Are you sure you want to delete this product? ')">
                        Delete</a>
            </td>
        
        </tr>

        @endforeach



    </table>

</div>

@endsection