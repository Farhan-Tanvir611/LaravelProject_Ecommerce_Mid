<?php
//use App\Http\Controllers\Customer\CustomerController;
//$total=CustomerController::cartitem();
?>

<h1>Students Dashboard</h1>
<h2>Welcome Mr {{$user->C_name}}</h2>
<a href="{{route('logout')}}">Logout</a>
<br><br>
<a href="{{route('cart')}}"> ALL CARTS</a>

<center><h1>All Products</h1>
<table border='4'>
    
<tr>
    <td>Product Name</td>
    <td></td>
        <td>Product Description</td>
    <td></td>

        <td>Product Price</td>
        <td></td>
        <td>Product Picture</td>
        <td></td>
        <td>Add</td>
</tr>


@foreach ($product as $products)
<tr>
    <td>{{$products->P_name}}</td>
    <td></td>
    <td><text>{{$products->P_description}}</text></td>
    <td></td>

        <td>BDT. {{$products->P_price}}</td>
        <td></td>
        <td>
          <a><img src="{{asset('storage/profile_images/'.$products->P_image)}}" width="100px" height="150px" alt="">
</a></td>
<td></td>

<td>


<!--Add on Cart table-->
    <form action="/add_to_cart" method="POST">
        {{@csrf_field()}}

        <input type="hidden" name="p_id"  value="{{$products->P_id}}"><br>
        <input type="submit" value="Add to Cart">
</form></td>
@endforeach
</tr>

</table>

<span>
    {{$product->links()}}
</span>
<style>
    .w-5{
     display:none;
}
</style>