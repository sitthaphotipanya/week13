@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="product-details">
  <table class="content-result">
    <tbody>
      <tr>
        <td class="lbl">Code ::</td>
        <td class="type">{{ $shop->code }}</td>
      </tr>
      <tr>
        <td class="lbl">Name ::</td>
        <td class="value">{{ $shop->name }}</td>
      </tr>
      <tr>
        <td class="lbl">Owner ::</td>
        <td class="value">{{ $shop->owner }}</td>
      </tr>
      <tr>
        <td class="lbl">Location ::</td>
        <td class="value">{{ $shop->longitude }}</td>
      </tr>
      <tr>
        <td class="lbl">Address ::</td>
        <td class="value">{{ $shop->address }}</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection