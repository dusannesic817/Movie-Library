@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="row justify-content-center">
			<div class="row mb-2">

    @if(session('alertMsg'))
		<x-message 
		type="{{session('alertType')}}"
		message="{{ __(session('alertMsg')) }}"
		/>
    @endif
	<div class="card">
		<a class="btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
		<div class="d-flex justify-content-between">
			<div class="card-header" >{{ __('Filter') . ": " . __('Film') }}	
		</div>
		<div>
    		<i class="bi bi-three-dots"></i>	
		</div>
		</div>
	</a>
			<div class="collapse" id="collapseExample">
				<div class=" mt-3">
			<form class="d-flex" action="{{ route('film.index') }}">
				<div class="row">
					
						<div class="col-12 mb-3">
							<input class="form-control me-2"
							type="search"
							name="search"
							placeholder="Search" 
							aria-label="Search">
						</div>
					</div>
					<div class="col-2 mb-2" style="margin-left:30px;">
						<select class="form-select @error('rating') is-invalid @enderror" name="rating">
							<option value="">Rating</option>
							<option value="10" @selected(old('rating', ($populateData['rating']??''))==10)>10</option>
							@for ($i = 9; $i >= 1; $i--)
								<option value="{{ $i }}" @selected(old('rating', ($populateData['rating']??''))==$i)>{{ $i }}+</option>
							@endfor						
						</select>
						@error('rating')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
					<div class="col-2 mb-2" style="margin-left:30px;">
						
						<div class="input-group @error('year_from') is-invalid @enderror @error('year_to') is-invalid @enderror">
							<input type="text" class="form-control" placeholder="Year from"  name="year_from" value="{{ old('year_from', ($populateData['year_from']??'')) }}">
							<input type="text" class="form-control" placeholder="Year to"  name="year_to" value="{{ old('year_to', ($populateData['year_to']??'')) }}">
						</div>

						@error('year_from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
						@error('year_to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-2 mb-2" style="margin-left:30px;">
    					<select class="form-select" name="genre">
							<option value="">Genre</option>
							@foreach ($genres as $genre)
								<option value="{{ $genre->id }}" @selected(($populateData['genre']??'')==$genre->id)>{{ $genre->name }}</option>
							@endforeach						
						</select>
					</div>
					<div class="col-2 mb-2" style="margin-left:30px;">
						
    					<select class="form-select" name="star" >
							<option value="">Star</option>
							@foreach ($people as $p)
								<option value="{{ $p->id }}" @selected(($populateData['star']??'')==$p->id)>{{ $p->full_name }}</option>
							@endforeach						
						</select>
					</div>
				</div>
				<div class="row mb-3" style="margin-right: 30px; ">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<button class="btn btn-primary me-md-2" type="submit">{{ __('Search') }}</button>
					<a class="btn btn-secondary" href="{{ route('film.index') }}">
								{{ __('Cancel') }}
							</a>
				  </div>
				</div>

			</form>
		</div>
	</div>
</div>
</div>
</div>

<div class="col-12">
	<div class="row mb-2">
		<div class="col-12">
			<a type="button"
				class="btn btn-primary float-end"
				href="{{ route('film.create') }}"> {{ __('Add') }}
			</a>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered mb-0">
			<thead>
				<tr>
					<th>#</th>
					<th style="font-family: 'Poppins', sans-serif;
					color: #012970;">{{ __('Image') }}</th>
					<th  style="font-family: 'Poppins', sans-serif;
					color: #012970;">{{ __('Name') }}</th>
					<th  style="font-family: 'Poppins', sans-serif;
					color: #012970;">{{ __('Running time') }}</th>
					<th  style="font-family: 'Poppins', sans-serif;
					color: #012970;">{{ __('Year') }}</th>
					<th  style="font-family: 'Poppins', sans-serif;
					color: #012970;">{{ __('Rating') }}</th>
					<th  style="font-family: 'Poppins', sans-serif;
					color: #012970;">{{ __('Genres') }}</th>
					<th  style="font-family: 'Poppins', sans-serif;
					color: #012970;">#</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($datas as $film)
				<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td style="text-align: center;"><img src="{{ $film->imgSrc }}" alt="{{ $film->name }}" class="mb-2" style="width: 100px;" /></td>
					<td><a href="{{route('film.show',$film)}}" >{{ $film->name }}</a>
					
						<p class="m-0"><strong>{{ __('Directors')}}:</strong>
						@foreach($film->directors as $p)
							{{  $p->full_name}}
						@endforeach	
						</p>

						<span class="m-0"><strong>{{ __('Writers')}}:</strong>	
						@foreach($film->writers as $p)
							{{  $p->full_name}}
						@endforeach		
						</span>

						<div class='d-flex flex-row bd-highlight mb-3'>
							<strong>{{ __('Stars')}}:</strong>
							<div style="color:#aab7cf;">
							@foreach($film->stars as $p)
								{{$p->full_name}}
							@endforeach	
							</div>			
						</div>
				
					</td>
					<td>{{ $film->running_time }}</td>
					<td>{{ $film->year }}</td>
					<td>{{ $film->rating }}</td>
					<td>
						@foreach($film->genres as $g)
							<p>{{$g->name}}</p>
						@endforeach
					</td>
					<td>
					<div class="btn-group" role="group">
						<form method="post" action="{{route('film.destroy',$film)}}">
							@method('delete')
							@csrf
								<a href="{{route('film.edit',$film)}}" type="button" class="btn btn-info btn-sm">{{ __('Edit') }}</a>
								<button type="submit" class="btn btn-danger btn-sm delete-button">{{ __('Delete') }}</button>
						</form>
					</div>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $datas->links() }}
	</div>
</div>
    </div>
	
</div>

@endsection