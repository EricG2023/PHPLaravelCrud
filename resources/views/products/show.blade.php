@extends('layouts.products')
@section('title', 'Detail')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <img src="{{ $product->image }}" class="img-fluid mb-3" alt="{{ $product->name }}" style=width:300px; height="150px">
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Item Number:</strong> {{ $product->item_number }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to all products</a>
    </div>
</div>
@endsection