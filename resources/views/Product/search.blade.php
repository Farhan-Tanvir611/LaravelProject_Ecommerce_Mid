
<html>
@extends('layouts.allmain')
@section('content')
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
        <td>Add to Cart</td>
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

          <td><b> <a href="{{route('dashboard')}}">Add to  Cart</a></td>
        
</tr>
@endforeach
</table>

</body>
@endsection
</html>