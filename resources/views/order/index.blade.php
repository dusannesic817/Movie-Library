@extends('layouts.app')

@section('content')
    <x-container>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Member Name</th>
                    <!-- Ostala zaglavlja kolona -->
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @foreach ($order->member as $value)
                            <p>{{$value->name}}</p>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </x-container>
@endsection
