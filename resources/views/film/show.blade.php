@extends('layouts.app')

@section('content')
    

<div class="container">
  <div class="row">
		<div>
        <a  href="{{route('film.index')}}" style="text-decoration: none;">
           <p style="font-size:18px;">< {{ __('Back') }}</p> 
        </a>
		</div>
</div>
<div class="row mb-2">
  <div class="card">
    <div class="row">
      <div class="col-4 text-center my-5">
        <img src="{{ $film->imgSrc }}" alt="{{ $film->name }}" class="mb-2" style="width: 250px;" />
        <h5>{{ $film->name }}</h5>
        <p class="text-muted">{{ $film->year }}</p>
        <a href="{{route('film.edit', $film)}}" type="button" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
      </div>
      <div class="col-8">
        <div class="card-body">
          <h5>{{ __('Information')}}</h5>
          <hr class="mt-0 mb-4">
          <div class="row">
            <div class="col-6 mb-3">
              <h6>{{ __('Rating')}}</h6>
              <p class="text-muted">{{ $film->rating}}</p>
            </div>
            <div class="col-6 mb-3">
              <h6>{{ __('Running time')}}</h6>
              <p class="text-muted">{{$film->running_h . " h" . $film->running_m. " m"}}</p>
            </div>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <p class="mb-0">{{ __('Directors')}}</p>
              <p class="text-muted">
                @foreach($film->directors as $director)
              
                {{$director->fullName}}
           
                @endforeach
                
            </p>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <p class="mb-0">{{ __('Writers')}}</p>
              <p class="text-muted">
                @foreach($film->writers as $writer)
            
                {{$writer->fullName}}
                @endforeach
                </p>
          </div>

          <div class="row">
            <div class="col-12 mb-3">
              <p class="mb-0">{{ __('Stars')}}</p>
              <p class="text-muted">
                @foreach($film->stars as $star)
                {{  $star->fullName}}
                @endforeach
            </p>
          </div>

          <h5>{{ __('Genres')}}</h5>
          <hr class="mt-0 mb-2">
          <div class="row">
            <div class="col-12 mb-1">
              <p class="text-muted">
                @foreach($film->genres->sortBy('name') as $ganre)   
                    {{$ganre->name}}
                @endforeach
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection