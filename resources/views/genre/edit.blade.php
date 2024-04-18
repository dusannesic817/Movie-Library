@include('layouts.app')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Genres'). " ". __("Edit") }}</div>
             

              <div class="card-body">

                <form method="POST" action="{{ route('genre.update', [$genre->id]) }}">

                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name_en" class="form-label">{{ __("Name En") }}</label>
                        <input type="text" class="form-control" 
                        id="name_en"
                        name="name_en"
                        value="{{old('name_en' , $genre->name_en)}}"
                        >
                        @error('name_en')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                       </span>
                       @enderror
                      </div>
                      <div class="mb-3">
                        <label for="name_sr" class="form-label">{{ __("Name Sr") }}</label>
                        <input type="text" class="form-control"
                        id="name_sr"
                        name="name_sr"
                        value="{{old('name_sr' , $genre->name_sr)}}"
                         >
                         @error('name_sr')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                         </span>
                         @enderror
                      </div>
                      <div class="mb-3 row">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
                            <a href="{{ route('genre.index') }}" class="btn btn-secondary">{{ __("Cancel") }}</a>
                        </div>
                        

                      </div>
                      
              </form>
                
              </div>
          </div>
      </div>
  </div>
</div>


