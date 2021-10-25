@extends('layouts.main')

@section('title', $title)

@section('content')
  <table class="product-list">
    <thead>
      <tr>
        <th>Code</th><th>Name</th>
      </tr>
    </thead>
    <tbody>
    <form action="{{ route('product-list') }}" method="get" class="search-form">
<label>
Min Price
<input type="number" name="minPrice" value="{{ $search['minPrice'] }}" />
</label><br />
<label>
Max Price
<input type="number" name="maxPrice" value="{{ $search['maxPrice'] }}" />
</label><br />
Search
<input type="text" name="term" value="{{ $search['term'] }}" />
</label>
<br />
<button type="submit" class="primary">Search</button>
<a href="{{ route('product-list') }}">
<button type="button" class="accent">Clear</button>
</a>
</form>
<div>{{ $products->withQueryString()->links() }}</div>
<nav>
<ul>
<li>
<a href="{{ route('product-create-form') }}">New Product</a>
</li>
</ul>
</nav>
@foreach($products as $product)
<tr>
<td>{{ $product->shops_count }}</td>
</tr>
@endforeach
    </tbody>
  </table>
@endsection
