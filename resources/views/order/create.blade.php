@extends('layouts.app')


@section('content')
    <x-container>
        <div class="card">
            <div class="card-header">{{ __('Make an order') . " " . __('for '). $copy->code }}</div>
            <div class="card-body">
               
                <div class="row">
                    <div class="col-4">
                        <div class="mt-4" style="text-align: center;"><img src="{{ $copy->film->imgSrc }}" alt="" class="mb-2" style="width: 150px;" /></div>
                        <div class="mt-3"style="text-align: center;">{{$copy->film->name}}</div>
                       
                    </div>
                    <div class="col-8">
                        <form method="POST" action="{{ route('order.store',[$copy->id]) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="id_number" class="form-label">{{ __("ID Number") }}</label>
                                <input type="text" class="form-control  @error('id_number') is-invalid @enderror"
                                id="id_number"
                                name="id_number"
                                value="{{old('id_number')}}"
                                />
                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="created_at" class="form-label">{{ __("Created at") }}</label>
                                <input type="date" class="form-control  @error('created_at') is-invalid @enderror" 
                                id="created_at"
                                name="created_at"
                                value="{{old('created_at')}}"
                                />
                            @error('created_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="to_date" class="form-label">{{ __("Return Date") }}</label>
                                <input type="date" class="form-control  @error('to_date') is-invalid @enderror" 
                                id="to_date"
                                name="to_date"
                                value="{{old('to_date')}}"
                                />
                            @error('to_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="mb-3 mt-3 row">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                                    <a href="{{ route('genre.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
    </x-container>
@endsection