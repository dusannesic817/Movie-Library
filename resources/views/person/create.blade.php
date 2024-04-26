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
              <div class="card-header">{{ __('People'). " ". __("Add") }}</div>
              <div class="card-body">
                <form method="POST" action="{{route('person.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __("Name") }}</label>
                        <input type="text" class="form-control" 
                        id="name"
                        name="name"
                        value="{{old('name')}}"
                        >
                     {{-- @error('name_en')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                       </span>--}}
                       <div class="mb-3 mt-3">
                        <label for="sruname" class="form-label">{{ __("Surname") }}</label>
                        <input type="text" class="form-control" 
                        id="sruname"
                        name="surname"
                        value="{{old('sruname')}}"
                        >
                     {{-- @error('name_en')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                       </span>--}}

                       <div class="mb-3 mt-3">
                        <label for="b_date" class="form-label">{{ __("Date") }}</label>
                        <input type="date" class="form-control" 
                        id="b_date"
                        name="b_date"
                        value="{{old('b_date')}}"
                        >
                     {{-- @error('name_en')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                       </span>--}}
                </form>
              </div>
          </div>
        </div>
  </div>
</div>

@endsection

<script>
$(function(){
    $('#datepicker').datepicker();
  });
</script>
