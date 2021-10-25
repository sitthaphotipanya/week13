@extends('layouts.main')

@section('title', $title)

@section('content')
<form action="{{ route('product-update', [
'product' => $product->code,
]) }}" method="post">
@csrf
<label>Code
<input type="text" name="code" value="{{ old('code', $product->code) }}"
required />
</label><br />
<label>Name
<input type="text" name="name" value="{{ old('name', $product->name) }}"
required />
</label><br />
<label>Price
<input type="number" step="any" name="price"
value="{{ $product->price }}" />

</label><br />
<select name="category" required>
@foreach($categories as $category)
<option value="{{ $category->code }}"
{{ ($category->code === old('category', $product->category->code))?
' selected' : '' }}>
[{{ $category->code }}] {{ $category->name }}
</option>
@endforeach
</select>
<textarea name="description" cols="80" rows="10"
required>{{ old('description', $product->description) }}</textarea>
<label>
Description
{{-- No space between <textarea> and {{$product->description }} --}}
<textarea
name="description" cols="80" rows="10"
>{{ $product->description }}</textarea>
</label><br />

<button type="submit">Update</button>
</form>
@endsection