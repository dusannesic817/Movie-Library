@extends('layouts.app')
  
@section('content')
    

<x-container>
    <div class="card">
        <div class="card-header">{{ __('Add') . ": " . __('Film') }}</div>
        <div class="card-body">
            <form method="POST" action="{{route('film.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-2 col-form-label text-end">{{ __('Name') }}</label>
                    <div class="col-10">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                        id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="running_time" class="col-2 col-form-label text-end">{{ __('Running time') }}</label>
                    <div class="col-4">
                        <div class="input-group @error('running_h') is-invalid @enderror @error('running_m') is-invalid @enderror">
                            <input type="text" class="form-control" id="running_h" name="running_h" value="{{ old('running_h') }}">
                            <input type="text" class="form-control" id="running_m" name="running_m" value="{{ old('running_m') }}">
                        </div>
                        @error('running_h')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('running_m')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="year" class="col-1 col-form-label text-end">{{ __('Year') }}</label>
                    <div class="col-2">
                        <input type="text" class="form-control @error('year') is-invalid @enderror"
                        id="year" name="year" value="{{ old('year') }}">
                        @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <label for="rating" class="col-1 col-form-label text-end">{{ __('Rating') }}</label>
                    <div class="col-2">
                        <input type="text" class="form-control @error('rating') is-invalid @enderror"
                        id="rating" name="rating" value="{{ old('rating') }}">
                        @error('rating')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                    
                </div>

                <div class="row mb-3 border border-start-0 border-top-0 border-end-0">
                    <label for="director" class="col-2 col-form-label text-end">{{ __('Directors') }}</label>
                    <div class="col-10">

                       
                        @foreach($people as $p)
                            <div class="form-check form-check-inline col-3 @error('directors') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" 
                                name="directors[]" id="iChbDirectors{{$p->id}}" 
                                value="{{$p->id}}"
                                @checked(in_array($p->id, old('directors',[])))
                                >
                                <label class="form-check-label" for="iChbDirectors{{$p->id}}">{{$p->fullName}}</label>
                            </div>
                            @endforeach
                            @error('directors')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>

                <div class="row mb-3 border border-start-0 border-top-0 border-end-0">
                    <label for="director" class="col-2 col-form-label text-end">{{ __('Writers') }}</label>
                    <div class="col-10">
                      @foreach($people as $p)
                        <div class="form-check form-check-inline col-3 @error('writers') is-invalid @enderror">
                            <input class="form-check-input" type="checkbox" 
                            name="writers[]" id="iChbWriters{{$p->id}}" 
                            value="{{$p->id}}"
                            @checked(in_array($p->id, old('writers',[])))
                            >
                            <label class="form-check-label" for="iChbWriters{{$p->id}}">{{$p->fullName}}</label>
                        </div>
                        @endforeach
                        @error('writers')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 border border-start-0 border-top-0 border-end-0">
                    <label for="director" class="col-2 col-form-label text-end">{{ __('Stars') }}</label>
                    <div class="col-10">
                            @foreach($people as $p)
                            <div class="form-check form-check-inline col-3 @error('stars') is-invalid @enderror">
                                <input class="form-check-input" type="checkbox" 
                                name="stars[]" id="iChbStars{{$p->id}}" 
                                value="{{$p->id}}"
                                @checked(in_array($p->id, old('stars',[])))
                                >
                                <label class="form-check-label" for="iChbStars{{$p->id}}">{{$p->fullName}}</label>
                            </div>
                            @endforeach
                        
                            @error('stars')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>

                <div class="row mb-3 border border-start-0 border-top-0 border-end-0">
                    <label for="genre" class="col-2 col-form-label text-end">{{ __('Genres') }}</label>
                    <div class="col-10">
                        @foreach($genres as $genre)
                        <div class="form-check form-check-inline col-3 @error('genres') is-invalid @enderror">
                            <input class="form-check-input" type="checkbox" 
                            name="genres[]"  {{-- stavlja se niz da bi moglo vise njih da se izaberu i posalju--}}
                            id="iChbGenres{{$genre->id}}"  {{--poklapa se sa for zbog kliktanja i na ime a ne samo na box polje--}}
                            value="{{$genre->id}}"    {{-- value je vrednost cekiranih opcija--}}
                            @checked(in_array($genre->id, old('genres',[])))  
                            >
                            <label class="form-check-label" for="iChbGenres{{$genre->id}}">{{$genre->name}}</label>
                        </div>
                        @endforeach
                        
                        @error('genres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="image" class="col-2 col-form-label text-end">{{ __('Image') }}</label>

                  <div class="col-4 text-center">
                        <img id="showImage" src="/storage/film_images/default-movie.jpg" alt="" class="mb-2" style="width: 100px;" />
                    </div>

                    <div class="col-6">
                        <div class="input-group col-6">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                            id="image" name="image" value="{{ old('image') }}" >
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            

                <div class="row mb-0 float-end">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>

                        <a class="btn btn-secondary" href="{{ route('film.index') }}">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-container>

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection