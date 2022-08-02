
<html>
@extends('layouts.sellermain')
@section('content')
    <body>
<center>
        <form method="post" action="" enctype="multipart/form-data">
  {{@csrf_field()}}

        Product Name: <input type="text" name="p_name" placeholder="Peroduct Name" value="{{old('P_name')}}"><br>
 @error('P_name')
         {{$message}}<br>
        @enderror
 <br>
        Product Description:<textarea type="text" name="P_description" value="{{old('P_description')}}" placeholder="Product Description"></textarea><br>
        @error('P_description')
            {{$message}}<br>
        @enderror
<br>
        Price: <input type="text" name="P_price" value="{{old('P_price')}}" placeholder="Product Price"><br>
        @error('P_price')
            {{$message}}<br>
        @enderror
<br>
        <input type="file" name="P_photo">
        @error('P_photo')
            {{$message}}<br>
        @enderror
<br>



        <br><input type="submit" value="Add"><br>
        </form>
    </body>
@endsection
</html>

