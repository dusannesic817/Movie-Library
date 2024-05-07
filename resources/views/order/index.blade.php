@extends('layouts.app')

@section('content')
    <x-container>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Member Name</th>
                    <th>Movie Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($copies as $copy)
                <tr>
                    <td> <a href="{{route('order.list',$copy)}}">{{$copy->film->name}}</a></td>
                    <td>
                        @foreach ($copy->member as $order)
                        dd({{$order}})
                        
                    
                        @endforeach
                    </td>
                  
                    
                       
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-container>
@endsection
