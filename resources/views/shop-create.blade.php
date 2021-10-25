@extends('layouts.main')
 
@section('title', $title)
 
@section('content')
  <main>
    <form action="{{ route('shop-create') }}" method="post">
      @csrf
      <table>
        <tr>
          <td class="field-label"><label for="code">Code :: </label></td>
          <td><input class="thead" id="code" type="text" name="code" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="name">Name :: </label></td>
          <td><input class="thead" id="name" type="text" name="name" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="owmer">Owner :: </label></td>
          <td><input class="thead" id="owner" type="text" step="0.25" name="owner" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="latitude">Latitude :: </label></td>
          <td><input class="thead" id="latitude" type="text" step="0.25" name="latitude" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="longitude">Longitude:: </label></td>
          <td><input class="thead" id="longitude" type="text" step="0.25" name="longitude" /></td>
        </tr>
        <tr>
          <td class="field-label"><label for="address">Address:: </label>
          <td><textarea class="thead" id="address" name="address" cols="40" rows="5"></textarea></td>
        </tr>
        </table>
        
      
      <div class="actions-panel">
        <button type="submit">Create</button>
      </div>
    </form>
  </main>
@endsection