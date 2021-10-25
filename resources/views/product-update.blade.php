@extends('layouts.main')
 
@section('title', $title)
 
@section('content')
  <main>
    <form action="{{ route('product-update', [
    'product' => $product->code,
]) }}" method="post">
      @csrf
      <table class="centered">
        <tr>
          <td class="field-label"><label for="code">Code :: </label></td>
          <td><input class="thead1" id="code" type="text" name="code" value="{{ $product->code }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="name">Name :: </label></td>
          <td><input class="thead1" id="name" type="text" name="name" value="{{ $product->name }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="number">Price :: </label></td>
          <td><input class="thead1" id="number" type="number" step="0.25" name="number" value="{{ $product->price }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="description">Description :: </label>
          <td>
            <textarea class="thead1" id="description" name="description" cols="40" rows="5">{{ $product->description }}</textarea>
          </td>
        </tr>
      </table>
 
      <div class="actions-panel">
        <button type="submit">Update</button>
      </div>
    </form>
  </main>
@endsection