@extends('layouts.app')

@section('content')
    <x-container>
        <div class="row mb-3">
            <a href="{{route('film.index')}}" class="btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
          <div class="card">
              <div class="card-header">{{ __('Orders') }}</div>
             

              <div class="card-body">
                <table class="table">
   
                  <thead>
                    <tr>
                      <th scope="col">{{ __('No') }}</th>
                      <th scope="col">{{ __('Name') }}</th>
                      <th scope="col">{{ __('Code') }}</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($copies as $copy)   
                    <tr>
                        <td>{{($copies->currentPage()-1) * $copies->perPage() + $loop->iteration }}</td>
                        <td><a href="{{route('order.list',$copy)}}">{{$copy->film->name}}</a></td>
                        <td>{{$copy->code}}</td>
                        <td>
                       
                    {{--    <form method="POST" action="{{route('member.destroy', [$value->id])}}">
                          @method("DELETE")
                          @csrf
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('member.edit', [$value->id])}}" class="btn btn-success"> {{ __('Edit') }}</a>
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                          </div>
                        </form>--}} 
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              
              </table>
               {{$copies->links()}} 
            </div>
          </div>
    </x-container>
@endsection
