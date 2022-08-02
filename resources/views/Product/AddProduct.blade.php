<html>

<body>

    <form method="post" action="">

        {{@csrf_field()}}
        <h1>Add Product Here</h1>
        <a href="{{route('product.createproduct')}}">Add Product</a>
    </form>

</body>

</html>