@extends('layouts.app')

@section('content')
    <x-container>

        <div class="row mb-3">
            <div class="card">
                <div class="card-header">{{ __('Ordered by') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Member ID') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('City') }}</th>
                                <th scope="col">{{ __('ID Number') }}</th>
                                <th scope="col">{{ __('Expire') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list->member as $m)
                       
                                <tr>
                                        <td>{{$m->id}}</td>                           
                                        @if ($m->pivot->status == 1)
                                            <td>  <a href="{{ route('member.show', [$m->id]) }}">{{ $m->name . ' ' . $m->surname }}</a></td>
                                            <td>{{ $m->city }}</td>
                                            <td>{{ $m->id_number }}</td>
                                            @php
                                                $to_date = Carbon\Carbon::parse($m->pivot->to_date);
                                            @endphp
                                            <td>{{ $m->rest_days($to_date) }}</td>
                                        @else
                                            <td>{{ 'no name' }}</td>
                                        @endif
                                    
                                </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    
                    {{-- {{ $list->links() }} --}}
                </div>
            </div>
        </div>
        @foreach ($list->member as $m)
        @endforeach
    </x-container>
@endsection
