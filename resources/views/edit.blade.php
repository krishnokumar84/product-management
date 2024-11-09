<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<form action="{{ url('/products/' . $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Form fields here pre-filled with $product data -->
    <button type="submit">Update Product</button>
</form>

</body>
</html>