@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('alertMsg'))
            <div class="alert alert-{{session('alertType')}} alert-dismissible fade show" role="alert">
              {{ __(session('alertMsg')) }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Member'). " ". __("Add") }}</div>
                <div class="card-body">
                  <form method="POST" action="{{route('member.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __("Name") }}</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" 
                            id="name"
                            name="name"
                            value="{{old('name')}}"
                            />
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                          @enderror
                        </div>
                          <div class="mb-3">
                            <label for="surname" class="form-label">{{ __("Surname") }}</label>
                            <input type="text" class="form-control  @error('surname') is-invalid @enderror"
                            id="surname"
                            name="surname"
                            value="{{old('surname')}}"
                            />
                            @error('surname')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
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
                          <div class="mb-3">
                            <label for="city" class="form-label">{{ __("City") }}</label>
                            <input type="text" class="form-control  @error('city') is-invalid @enderror"
                            id="city"
                            name="city"
                            value="{{old('city')}}"
                            />
                            @error('city')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="address" class="form-label">{{ __("Address") }}</label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror"
                            id="address"
                            name="address"
                            value="{{old('address')}}"
                            />
                            @error('address')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="b_date" class="form-label">{{ __("Birth") }}</label>
                            <input type="date" class="form-control  @error('b_date') is-invalid @enderror" 
                            id="b_date"
                            name="b_date"
                            value="{{old('b_date')}}"
                            />
                          @error('b_date')
                            <span class="invalid-feedback" role="alert">
                                  <strong>{{$message}}</strong>
                            </span>
                           @enderror
                           
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
  </div>
@endsection
  
  
  
  
  
  