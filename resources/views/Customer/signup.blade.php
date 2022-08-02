<html>
    <body>
        <center>
        <head></head>
 <form method="post" action="">
    {{@csrf_field()}}
    <h1>Registration Page</h1>
    <table border='3'>

      <tr><td>  Name: <input type="text" name="name" placeholder="Name" value="{{old('name')}}"><br>
        @error('name')
            {{$message}}<br>
        @enderror
</td></tr><br>
<tr><td>
        ID: <input type="text" name="id" placeholder="id" value="{{old('id')}}"><br>
        @error('id')
            {{$message}} <br>
        @enderror
</td></tr><br>  
<tr><td>      
        Email: <input type="text" name="email" placeholder="email" value="{{old('email')}}"><br>
        @error('email')
            {{$message}} <br>
        @enderror
        </td></tr><br>  
<tr><td>      
        Phone: <input type="text" name="phone" placeholder="phone" value="{{old('phone')}}"><br>
        @error('phone')
            {{$message}} <br>
        @enderror
        </td></tr><br>  
<tr><td>      
        Address: <input type="text" name="address" placeholder="address" value="{{old('address')}}"><br>
        @error('address')
            {{$message}} <br>
        @enderror
        </td></tr><br> <br> 
<tr><td>              
        Password: <input type="password" name="password"><br>
        @error('password')
            {{$message}}<br>
        @enderror
        </td></tr><br>  
<tr><td>      
        Confirm Password: <input type="password" name="conf_password"><br>
        @error('conf_password')
            {{$message}}<br>
        @enderror
        </td></tr><br>
        <tr><td> 
<tr><td>      
     <center><input type="submit" value="Register">
     </td></tr><br>  
     
</table>
</form>

</body>
    </html>
