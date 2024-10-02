@extends('layouts.products')
@section('title', 'All Products')

@section('content')

    @can('create', App\Models\Product::class)
        <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Create</a>
    @endcan
    @if(auth()->check())
    <p>{{$products->links( )}}</p>
    @endif
    <h1>Products</h1>
    <p>
        @if(auth()->check())
    <form action="{{ route('products.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
        <a class= "btn btn-secondary" href="{{ route('products.index') }}">Clear </a>
    </form>
    </p>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Item Number</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->item_number }}</td>
                    <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Show Details</a></td>
                </tr>
            @endforeach
        </tbody>
</table>
 @endsection
