<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<!-- Search form -->
<form method="GET" action="{{ url('/products') }}">
    <input type="text" name="search" placeholder="Search by ID or Description">
    <button type="submit">Search</button>
</form>

<!-- Sorting links -->
<a href="{{ url('/products?sort_by=name') }}">Sort by Name</a> |
<a href="{{ url('/products?sort_by=price') }}">Sort by Price</a>

<!-- Display all products -->
@foreach($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Price: ${{ $product->price }}</p>
        <a href="{{ url('/products/' . $product->id) }}">View</a>
        <a href="{{ url('/products/' . $product->id . '/edit') }}">Edit</a>
        <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

<!-- Pagination -->
{{ $products->links() }}



</body>
</html>