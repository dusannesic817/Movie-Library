@extends('layouts.app')

@section('content')
<x-container>
  
            <div class="card">
                <div class="card-header">{{ __('Member'). " ". __("Edit") }}</div>
                <div class="card-body">
                  <form method="POST" action="{{route('member.update',[$member->id])}}">
                    @method("PUT")
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __("Name") }}</label>
                            <input type="text" class="form-control" 
                            id="name"
                            name="name"
                            value="{{old('name', $member->name)}}"
                            />
                            @error('name')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                          @enderror
                        </div>
                          <div class="mb-3">
                            <label for="surname" class="form-label">{{ __("Surname") }}</label>
                            <input type="text" class="form-control"
                            id="surname"
                            name="surname"
                            value="{{old('surname', $member->surname)}}"
                            />
                            @error('surname')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="id_number" class="form-label">{{ __("ID Number") }}</label>
                            <input type="text" class="form-control"
                            id="id_number"
                            name="id_number"
                            value="{{old('id_number', $member->id_number)}}"
                            />
                            @error('id_number')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="city" class="form-label">{{ __("City") }}</label>
                            <input type="text" class="form-control"
                            id="city"
                            name="city"
                            value="{{old('city', $member->city)}}"
                            />
                            @error('city')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="address" class="form-label">{{ __("Address") }}</label>
                            <input type="text" class="form-control"
                            id="address"
                            name="address"
                            value="{{old('address', $member->address)}}"
                            />
                            @error('address')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                              </span>
                            @enderror
                          </div>
                          <div class="mb-3 mt-3">
                            <label for="b_date" class="form-label">{{ __("Birth") }}</label>
                            <input type="date" class="form-control" 
                            id="b_date"
                            name="b_date"
                            value="{{old('b_date', $member->b_date)}}"
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
          </x-container>
@endsection
  
  
  
  
  
  