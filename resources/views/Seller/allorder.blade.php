@extends('layouts.sellermain')
@section('content')
<h3>Welcome Mr {{$user->S_name}}</h3>
<h1>All orders</h1>
<center>
    <table border='4'>
        <tr >
        <th>Customer Name </th>
            <th>Phone </th>
            <th>Delivery Address </th>
            <th>Order Name</th>
            <th>Price</th>
            <th>Images</th>
            <th>Ordered Delivered</th>
</tr>

<?php $sum = 0?>
@foreach($allorders as $allorders)
<tr>
    <center>
<td>{{$allorders->C_name}}</td>
     <td>{{$allorders->C_phone}}</td>
     <td>{{$allorders->Shipping_place}}</td>
     <td>{{$allorders->P_name}}</td>
     <td>{{$allorders->P_price}}</td>
     
     <td>
          <a><img src="{{asset('storage/profile_images/'.$allorders->P_image)}}" width="100px" height="100px" alt="">
</a></td>
<td><a href = 'delete/{{ $allorders->CO_id }}'>Delivered</a></td>
     
    @endforeach
    </tr>
    
</table>


@endsection