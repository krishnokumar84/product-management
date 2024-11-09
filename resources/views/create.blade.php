<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<form action="{{ url('/products') }}" method="POST">
    @csrf
    <!-- Form fields here for product_id, name, description, price, stock, image -->
    <button type="submit">Create Product</button>
</form>

</body>
</html>