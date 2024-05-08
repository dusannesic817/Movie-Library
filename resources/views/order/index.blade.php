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
                    
                    @foreach ($uniqueCopy as $order)
                   
                    <tr>
                    <td>{{$order->id}}</td>
                    <td><a href="{{route('order.list', [$order->id])}}">{{$order->film->name}}</a></td>
                    <td>{{$order->code}}</td>
                  
                   
                    </tr>        
                    @endforeach
                  </tbody>
                
              </table>
               {{$copies->links()}} 
            </div>
          </div>
    </x-container>
@endsection
