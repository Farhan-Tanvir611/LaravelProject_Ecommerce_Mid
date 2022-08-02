<html>

<body>
<h3>Welcome Mr {{$user->C_name}}</h3>
<h1>All Carts</h1>
    <table border='4'>
        <tr >
            <th>Product Name</th>
            <th>Price</th>
            <th></th>
            <th></th>
           
</tr>

<?php $sum = 0?>
@foreach($carts as $carts)
<tr>
     <td>{{$carts->P_name}}</td>
     <td>{{$carts->P_price}}</td>
     <td><a href = 'delete/{{ $carts->Cart_id }}'>REMOVE</a></td>
      <?php $sum+=($carts->P_price)?>
    @endforeach
    </tr>
    
</table>
<br><br>
<table border='2'>
    <tr >
            <th>Total Amount</th>     
    </tr>

   <tr>
    <td><center> <?php echo $sum?></td></tr>
    </table>
    <br> <br>



    <table border='3'>

<tr>
 
<form action="/EditProduct" method="POST">
    {{@csrf_field()}}
       
<td>
        Shipping Place: <textarea type="text" name="Shipping_place" placeholder="Provide exact Location"></textarea><br>
        @error('id')
            {{$message}} <br>
        @enderror
        <br>
        <label for="method">Payment Type:</label>
  <select name="Payment_type" id="method">
    <option value="Cash">Cash On Delivery</option>
    <option value="Bkash">Bkash</option>
    <option value="Master Card">Master Card</option>
  </select><br>
        @error('password')
            {{$message}}<br>
        @enderror
        <b>
            <br>
            <center>
     <input type="submit" value="Confirm Order">
</td>
</tr>

</table>

   
    </body>
    </html>