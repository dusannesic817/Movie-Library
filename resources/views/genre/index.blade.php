@extends('layouts.app')


@section('content')
    

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">


        @if(session('alertMsg'))
          <x-message 
          type="{{session('alertType')}}"
          message=" {{ __(session('alertMsg')) }}"
          />
        @endif
      
        <div class="row mb-3">
            <a href="/genre/create" class="btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
          <div class="card">
              <div class="card-header">{{ __('Genres') }}</div>
             

              <div class="card-body">

                <table class="table">
   
                  <thead>
                    <tr>
                      <th scope="col">{{ __('No') }}</th>
                      <th scope="col">{{ __('Name En') }}</th>
                      <th scope="col">{{ __('Name Sr') }}</th>
                      <th scope="col">#</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($genres as $value)   
                    <tr>
                      <td>{{ ($genres->currentPage()-1) * $genres->perPage() + $loop->iteration }}</td>
                      <td>{{$value->name_en}}</td>
                      <td>{{$value->name_sr}}</td>
                      <td>
                       
                        <form method="POST" action="{{ route('genre.destroy', [$value->id])}}">
                          @method("DELETE")
                          @csrf
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('genre.edit', [$value->id])}}" class="btn btn-success"> {{ __('Edit') }}</a>
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                          </div>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              
              </table>
              {{ $genres->links() }}

              </div>
          </div>
      </div>
  </div>
</div>

@endsection




