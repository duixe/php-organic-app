@extends('admin.layout.base')

@section('title', 'Dashboard')

@section('content')

<div class="row">
  <div class="col-lg">
    <h1>dashboard</h1>
    <form action="/admin" method="post" enctype="multipart/form-data">
      <input name="product" value="testing">
      <input type="file" name="image">
      <input type="submit" name="submit" value="submit">
    </form>
  </div>

</div>

@endsection
