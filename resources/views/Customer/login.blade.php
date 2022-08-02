<html>
    <body>
        <head></head>
 <form method="post" action="">
    {{@csrf_field()}}
       

        ID: <input type="text" name="id" placeholder="ID" value="{{old('id')}}"><br>
        @error('id')
            {{$message}} <br>
        @enderror
        
        Password: <input type="password" name="password"><br>
        @error('password')
            {{$message}}<br>
        @enderror
     <input type="submit" value="Sign In">
    
</form>

</body>
    </html>
