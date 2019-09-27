@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
            <h1>Products</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>   {!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>   {!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th style="font-size: 12px">ID</th>
                                    <th style="font-size: 12px">CATEGORY NAME</th>
                                    <th style="font-size: 12px">PRODUCT NAME</th>
                                    <th style="font-size: 12px">PRODUCT CODE</th>
                                    <th style="font-size: 12px">PRODUCT COLOR</th>
                                    <th style="font-size: 12px">DESCRIPTION</th>
                                    <th style="font-size: 12px">PRICE</th>
                                    <th style="font-size: 12px">IMAGE</th>
                                    <th style="font-size: 12px">ACTIONS </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="gradeX">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td><strong>{{ $product->product_name }}</strong></td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->product_color }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }} €</td>
                                        <td>

                                            <img src="{{ asset('/images/backend_images/products/small/'.$product->image) }}">

                                        </td>
                                        <td class="ml-5 text-center">
                                            <a href="{{ url('admin/edit-product/'.$product->id) }}"  class="btn btn-mini" style="background-color: #27a9e3; color: white;">Edit</a>
                                            <a id="delPro" href="{{ url('admin/delete-product/'.$product->id) }}" class="btn btn-danger btn-mini">Delete</a>
                                            <a href="{{ url('admin/add-attributes/'.$product->id) }}" class="btn btn-success btn-mini">Add Attributes</a>
                                            <a href="#" data-toggle="modal" data-target="#info_product">info</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div id="info_product" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>Products Details</h3>
            </div>
            <div class="modal-body">

              <p>PRODUCT ID:   {{ $product->id }}</p>
              <p>CATEGORY ID {{ $product->category_id }}</p>
              <p>CATEGORY NAME {{ $product->category_name }}</p>
              <p>PRODUCT NAME {{ $product->product_name }}</p>
              <p>PRODUCT CODE {{ $product->product_code }}</p>
              <p>PRODUCT COLOR {{ $product->product_color }}</p>
              <p>DESCRIPTION {{ $product->description }}</p>
              <p>PRICE  {{ $product->price }}</p>
              <p>IMAGE {{ $product->image }}</p>
              <p>DATA CREATED {{ $product->created_at }}</p>
              <p>DATA UPDATED {{ $product->updated_at }}</p>

            </div>
        </div>
    </div>

@endsection
