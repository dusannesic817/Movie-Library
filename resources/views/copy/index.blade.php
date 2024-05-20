@extends('layouts.app')


@section('content')

    <x-container>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">{{ __('No') }}</th>
                <th scope="col">{{ __('Name') }}</th>
                <th scope="col">{{ __('Code') }}</th>
                <th scope="col">{{ __('Status') }}</th>
                <th scope="col">{{ __('Edit') }}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($copy as $value)
              <tr>
                <th scope="row">{{ ($copy->currentPage()-1) * $copy->perPage() + $loop->iteration }}</th>
                <td><a href="{{route('copy.show', $value)}}" style="text-decoration: none;"> {{$value->film->name}} </a></td>
                <td>{{$value->code}}</td>
                <td>{{$value->status}}
                    @if ($value->status=="Unavailable")
                    <i class="bi bi-circle-fill text-danger"></i>                  
                    @elseif($value->status=="Available")
                    <i class="bi bi-check-circle-fill text-success"></i>
                    @elseif($value->status=="Unknown")
                    <i class="bi bi-dash-circle-fill  text-danger"></i>
                    @endif
                    </td>
                    <td><a href={{route('copy.edit', $value)}}><i class="bi bi-pencil"></i></a></td>
              </tr>
           
              @endforeach
            </tbody>
          </table>
          {{ $copy->links() }}
       




</x-container>
@endsection