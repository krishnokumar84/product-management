<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Price: ${{ $product->price }}</p>
<p>Stock: {{ $product->stock }}</p>
<img src="{{ $product->image }}" alt="Product Image">

</body>
</html>