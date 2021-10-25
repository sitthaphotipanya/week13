@extends('layouts.main')

@section('title', $title)

@section('content')
<nav>
  <ul>
  <li><a href="{{ route('product-view', [
  'product' => $product->code,
  ]) }}">&lt; Back</a></li>
  </ul>
</nav>
  <form action="{{ route('product-view-shop', [
  'product' => $product->code,
  ]) }}" method="get" class="search-form">
    <a href="{{ route('product-view-shop', [
    'product' => $product->code,
    ]) }}">
      <button type="button" class="accent">Clear</button>
      </a>
  </form>
<div class="product-details">
  <table class="content-result">
    <tbody>
      <tr>
        <td class="lbl">Code ::</td>
        <td class="type">{{ $product->code }}</td>
      </tr>
      <tr>
        <td class="lbl">Name ::</td>
        <td class="value">{{ $product->name }}</td>
      </tr>
      <tr>
        <td class="lbl">Price ::</td>
        <td class="value">{{ number_format($product->price, 2) }}</td>
      </tr>
    </tbody>
  </table>
  <pre>{{ $product->description }}</pre>
</div>
<nav>
<ul>
<li><a href="{{ route('product-view-shop', [
'product' => $product->code,
]) }}">Show Shop</a></li>
  <li><a action="{{ route('product-update', [
'product' => $product->code,
]) }}" method="post">&lt; Update</a></li>
  <li><a action="{{ route('product-delete', [
'product' => $product->code,
]) }}" method="post">&lt; Delete</a></li>
  </ul>
</nav>
@endsection