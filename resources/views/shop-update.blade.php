@extends('layouts.main')
 
@section('title', $title)
 
@section('content')
  <main>
    <form action="{{ route('shop-update', [
    'shop' => $shop->code,
]) }}" method="post">
      @csrf
      <table class="centered">
        <tr>
          <td class="field-label"><label for="code">Code :: </label></td>
          <td><input class="thead"id="code" type="text" name="code" value="{{ $shop->code }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="name">Name :: </label></td>
          <td><input class="thead" id="name" type="text" name="name" value="{{ $shop->name }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="owner">Owner :: </label></td>
          <td><input class="thead" id="owner " type="text" step="0.25" name="owner" value="{{ $shop->owner }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="latitude ">Latitude :: </label></td>
          <td><input class="thead" id="latitude " type="text" step="0.25" name="latitude " value=" {{ $shop->latitude }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="longitude">Longitude  :: </label></td>
          <td><input class="thead" id="longitude" type="text" step="0.25" name="longitude" value="{{ $shop->longitude }}" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="address ">Address :: </label>
          <td>
            <textarea class="thead" id="address " name="address " cols="40" rows="5">{{ $shop->address }}</textarea>
          </td>
        </tr>
      </table>
 
      <div class="actions-panel">
        <button type="submit">Update</button>
      </div>
    </form>
  </main>
@endsection