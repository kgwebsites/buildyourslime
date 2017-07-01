@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <h1>Lab</h1>
  <hr>
  <div class="col-xs-12">
    <h2>Premades</h2>
  </div>
  <?php
  $i = 1;
  foreach($premades as $premade){
    if ($i == 4){$i = 1;}
    ?>
    <div class="col-md-4">
      <div class="panel panel-default">
        <form action="/admin/lab/update-premade" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="premade_id" value="{{ $premade->id }}">
          <img src="{{ $premade->image }}" alt="{{ $premade->name }}">
          <div class="panel-body">
            <h3><input class="form-control" name="premade_name" value="{{ $premade->name }}" required></h3>
            <p><textarea class="form-control" name="premade_description">{{ $premade->description }}</textarea></p>
            <p><i><input class="form-control" name="premade_slug" type="text" value="{{ $premade->slug }}" required></i></p>
            <button class="btn btn-success" type="submit">Update</button>
          </div>
        </form>
      </div>
    </div>
  <?php
  if($i == 3){ ?>
    <div class="clearfix"></div>
  <?php }
  $i++;
  } ?>
</div>
@endsection
