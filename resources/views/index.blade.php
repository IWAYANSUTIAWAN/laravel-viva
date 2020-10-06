@extends('layouts.master')
@section('content')
 <div class="section-body">
home {{ Auth::user()->name }}
{{ Auth::user()->email }}
</div>
@endsection