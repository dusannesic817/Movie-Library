@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="row mb-2">

                    <x-message type="{{ session('alertType') }}" message="{{ __(session('alertMsg')) }}" />

                    <div class="card">
						
                        @include('film.filter')

                        <div class="col-12">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <a type="button" class="btn btn-primary float-end" href="{{ route('film.create') }}">
                                        {{ __('Add') }}
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
									<thead style="font-family: 'Poppins', sans-serif !important; color: #012970 !important;">
                                        <tr>
                                            <th>#</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">
                                                {{ __('Image') }}</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">
                                                {{ __('Name') }}</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">
                                                {{ __('Running time') }}</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">
                                                {{ __('Year') }}</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">
                                                {{ __('Rating') }}</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">
                                                {{ __('Genres') }}</th>
                                            <th style="font-family: 'Poppins', sans-serif;
												color: #012970;">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $film)
                                            <x-film.film-items loop="{{ $loop->iteration }}" :film="$film" />
                                        @endforeach

                                    </tbody>
                                </table>
                                {{ $datas->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            @endsection
