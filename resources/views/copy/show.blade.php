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
                                    <th>Price</th>
                                    <td>{{$copy->price}}$</td>
                                  </tr>
                                  <tr>
                                    <th>Status</th>
                                    <td>{{$copy->statuus}}</td>
                                  </tr>
                                  <tr>
                                    <th>Available amount</th>
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
