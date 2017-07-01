@extends('layouts.master')

@section('content')
  <h1 class="text-center">Build Your Slime!</h1>
  @include('partials.build.'.$build_step)
@endsection
