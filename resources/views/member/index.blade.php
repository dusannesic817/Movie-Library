@extends('layouts.app')


@section('content')
<x-name-route :name="Route::currentRouteName()" />
<x-search route="member.index"/>
<x-container>
        
          <x-message 
          type="{{session('alertType')}}"
          message="{{ __(session('alertMsg')) }}"
          />
     
        <div class="row mb-3">
            <a href="{{route('member.create')}}" class="btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
          <div class="card">
              <div class="card-header">{{ __('Member') }}</div>
              <div class="card-body">

                <table class="table">
   
                  <thead>
                    <tr>
                      <th scope="col">{{ __('No') }}</th>
                      <th scope="col">{{ __('Name') }}</th>
                      <th scope="col">{{ __('ID Number') }}</th>
                      <th scope="col">{{ __('Edit/Delete') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($member as $value)   
                    <tr>
                       <td>{{ ($member->currentPage()-1) * $member->perPage() + $loop->iteration }}</td>
                      <td><a href="{{route('member.show',[$value->id])}}">{{$value->fullName}}</a></td>
                      <td>{{$value->id_number}}</td>
                      <td>
                       
                        <form method="POST" action="{{route('member.destroy', [$value->id])}}">
                          @method("DELETE")
                          @csrf
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('member.edit', [$value->id])}}" class="btn btn-success"> {{ __('Edit') }}</a>
                            <button type="submit" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                          </div>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              
              </table>
               {{ $member->links() }}

              </div>
          </div>
        </x-container>
@endsection