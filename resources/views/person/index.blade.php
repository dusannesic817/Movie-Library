@extends('layouts.app')


@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
      
      
          <x-message 
          type="{{session('alertType')}}"
          message="{{ __(session('alertMsg')) }}"
          />
    
        <div class="row mb-3">
            <a href="{{route('person.create')}}" class="btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
          <div class="card">
              <div class="card-header">{{ __('People') }}</div>
             

              <div class="card-body">

                <table class="table">
   
                  <thead>
                    <tr>
                      <th scope="col">{{ __('No') }}</th>
                      <th scope="col">{{ __('Name') }}</th>
                      <th scope="col">{{ __('Birth') }}</th>
                      <th scope="col">{{ __('Edit/Delete') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($person as $value)   
                    <tr>
                       <td>{{ ($person->currentPage()-1) * $person->perPage() + $loop->iteration }}</td>
                      <td>{{$value->fullName}}</td>
                      <td>{{$value->date}}</td>
                      <td>
                       
                        <form method="POST" action="{{route('person.destroy', [$value->id])}}">
                          @method("DELETE")
                          @csrf
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('person.edit', [$value->id])}}" class="btn btn-success"> {{ __('Edit') }}</a>
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                          </div>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              
              </table>
              {{ $person->links() }}

              </div>
          </div>
      </div>
  </div>
</div>
@endsection