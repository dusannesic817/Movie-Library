@extends('layouts.app')

@section('content')
    <x-container>
        <div class="card">
            <div class="card-header">{{ __('Payment') }}</div>
            <div class="card-body">

              <form method="POST" action="{{route('payment.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="amount" class="form-label">{{ __("Amount") }}</label>
                        <input type="number" class="form-control" 
                        id="amount"
                        name="amount"
                        />
                        @error('amount')
                          <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                          </span>
                      @enderror
                    </div>
                      <div class="mb-3 row">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                            <a href="{{ route('member.show',['member'=>session('member_id')])}}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                        </div>
                        

                      </div>
                      
              </form>
                
            </div>
        </div>

    </x-container>
@endsection