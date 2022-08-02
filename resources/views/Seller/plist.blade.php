
<html>
@extends('layouts.sellermain')
@section('content')
<h2>{{$user->S_name}}</h2>
    <body>
<center><h1>All Products</h1>
<table border='4'>
<tr>
        <td>Product ID</td>
        <td></td>
        <td>Product Name</td>
        <td></td>
        <td>Product Description</td>
        <td></td>
        <td>Product Price</td>
        <td></td>
        <td>Product Picture</td>
        <td></td>
        <td>Edit Product</td>
        <td></td>
        <td>Delete Product</td>
</tr>
@foreach($product as $products)
<tr>
    <td>{{$products->P_id}}</td>
    <td></td>
    <td>{{$products->P_name}}</td>
    <td></td>
    <td><text>{{$products->P_description}}</text></td>
    <td></td>
        <td>BDT. {{$products->P_price}}</td>
        <td></td>
        <td>
          <a><img src="{{asset('storage/profile_images/'.$products->P_image)}}" width="80px" height="90px" alt=""></a></td>

          <td></td>
        
          <td><a href='/SellerEditProduct/{{ $products->P_id }}'>Edit Product</a></td>

        <td></td>
        <td><a href = 'delete/{{ $products->P_id }}'>Delete</a></td>
</tr>
@endforeach
</table>


</style>
</center>
</body>
@endsection
</html>