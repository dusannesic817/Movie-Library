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
                <div class="card-header">{{ __('People'). " ". __("Edit") }}</div>
                <div class="card-body">
                  <form method="POST" action="{{route('person.update',[$person->id])}}">
                        @method("PUT")
                        @csrf
                      <div class="mb-3">
                          <label for="name" class="form-label">{{ __("Name") }}</label>
                          <input type="text" class="form-control" 
                          id="name"
                          name="name"
                          value="{{old('name', $person->name)}}"
                          />
                       @error('name')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                         </span>
                        @enderror
                         
                      </div>
                         <div class="mb-3 mt-3">
                          <label for="surname" class="form-label">{{ __("Surname") }}</label>
                          <input type="text" class="form-control" 
                          id="surname"
                          name="surname"
                          value="{{old('surname', $person->surname)}}"
                          />
                       @error('surname')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                         </span>
                        @enderror
                         </div>
  
                         <div class="mb-3 mt-3">
                          <label for="b_date" class="form-label">{{ __("Date") }}</label>
                          <input type="date" class="form-control" 
                          id="b_date"
                          name="b_date"
                          value="{{old('b_date', $person->b_date)}}"
                          />
                        @error('b_date')
                          <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                          </span>
                         @enderror
                         
                         </div>
                         <div class="mb-3 row">
                          <div class="btn-group" role="group">
                              <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                              <a href="{{ route('person.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                          </div>
                          
  
                        </div>
                  </form>
                </div>
            </div>
          </div>
    </div>
  </div>




@endsection