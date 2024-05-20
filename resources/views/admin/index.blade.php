@extends('layouts.app')


@section('content')
  
<div class="container mt-5">
    <x-cards :member="$member" :sales="$sales" :sum="$sum"/>
    <div class="row mt-5">
@foreach ($datas as $film)
<x-film.informations :film='$film' :loop="$loop"/>
@endforeach
    </div>
</div>
@endsection

