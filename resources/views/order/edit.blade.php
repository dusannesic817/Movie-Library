@extends('layouts.app')


@section('content')
    <x-container>
        <div class="card">
            <div class="card-header">{{ __('Deactivate an order ') . " " . __('for: '). $order->copy->code }}</div>
            <div class="card-body">
               
                <div class="row">
                    <div class="col-4">
                        <div class="mt-4" style="text-align: center;"><img src="{{ $order->copy->film->imgSrc }}" alt="" class="mb-2" style="width: 150px;" /></div>
                        <div class="mt-3"style="text-align: center;">{{$order->copy->film->name}}</div>
                       
                    </div>
                    <div class="col-8">
                        <form method="POST" action="{{ route('order.update',[$order->id]) }}">
                            @csrf
                            @method("PUT")
                            <div class="mb-3 mt-5">                  
                                    <label for="status" class="form-label">{{ __('Status') }}</label>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option value="0" {{ $order->status == '0' ? 'selected' : '' }}>Deactivate Order</option>
                                        <option value="1" {{ $order->status == "1" ? 'selected' : '' }}>Active Order</option>
                                    </select>
                            </div>
                           
                            <div class="mb-3 mt-3 row">
                                <div class="btn-group" role="group">
                                    <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                                    <a href="{{ route('member.show' ,['member' => $order->member_id]) }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
    </x-container>
@endsection



