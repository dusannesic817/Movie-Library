@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <a href="{{ route('film.index') }}" style="text-decoration: none;">
                    <p style="font-size:18px;">
                        < {{ __('Back') }}</p>
                </a>
            </div>
        </div>
        <div class="row mb-2">
            <div class="card">
                <x-film.informations :film="$film"/>
            </div>
        </div>
    </div>
@endsection
