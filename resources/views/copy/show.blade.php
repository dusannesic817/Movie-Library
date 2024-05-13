@extends('layouts.app')
@section('content')
    <x-container>

        <div class="card">
            <div class="card-header">{{ $copy->code}}</div>

            <div class="row">

                <div class="col-4 text-center my-5">
                    <img src="{{ $copy->film->imgSrc }}" alt="{{$copy->film->name}}" class="mb-2" style="width: 150px;" />
                    <h6 class="mt-3">{{$copy->film->name}}</h6>
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <div class="mt-5">
                            <table class="table">
                                <tbody>
                                  <tr>
                                    <th>{{ __('Price') }}</th>
                                    <td>{{$copy->price}}$</td>
                                  </tr>
                                  <tr>
                                    <th>{{ __('Status') }}</th>
                                    <td>{{__($copy->status)}}</td>
                                  </tr>
                                  <tr>
                                    <th>{{ __('Available Amount') }}</th>
                                    <td>{{$copy->amount}}</td>
                                  </tr>
                                </tbody>
                              </table>

                        </div>
                        
                    </div>
                </div>

            </div>




        </div>
        </div>
    </x-container>
@endsection
