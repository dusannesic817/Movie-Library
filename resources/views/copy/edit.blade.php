@extends('layouts.app')
@section('content')
    <x-container>
        <div class="card">
            <div class="card-header">{{ $copy->code }}</div>

            <div class="row">

                <div class="col-4 text-center my-5">
                    <img src="{{ $copy->film->imgSrc }}" alt="{{ $copy->film->name }}" class="mb-2" style="width: 150px;" />
                    <h6 class="mt-3">{{ $copy->film->name }}</h6>
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <div class="mb-3">

                        </div>
                        <form method="POST" action="{{ route('copy.update', [$copy->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="amount" class="form-label">{{ __('Amount') }}</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    value="{{ old('amount', $copy->amount) }}" />
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">{{ __('Price') }}</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ old('price', $copy->price) }}" />
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="status" class="form-label">{{ __('Status') }}</label>
                                <select class="form-select" aria-label="Default select example" name="status">
                                    <option value="Available" {{ $copy->status == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Unavailable" {{ $copy->status == "Unavailable" ? 'selected' : '' }}>Unavailable</option>
                                </select>
                                
                                
                                
                            </div>
                            <div class="mb-3 row">
                  
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                    <a href="{{ route('copy.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                </div>


                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </x-container>
@endsection
