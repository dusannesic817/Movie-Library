@extends('layouts.app')


@section('content')

<x-search route="film.index"/>
<x-filters :genres="$genres" :people="$people" :populateData="$populateData" />

    <div class="container mt-5">
        <div class="row">
            <x-message 
            type="{{ session('alertType') }}" 
            message="{{ __(session('alertMsg')) }}" 
            />
            @foreach ($datas as $film)
                <x-film.informations :film='$film' :loop="$loop"/>
            @endforeach
        </div>
        {{ $datas->links() }}
    </div>
@endsection
