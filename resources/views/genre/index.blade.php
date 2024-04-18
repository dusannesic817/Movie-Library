@include('layouts.app')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="row mb-3">
            <a href="/genre/create" class="btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
          <div class="card">
              <div class="card-header">{{ __('Genres') }}</div>
             

              <div class="card-body">

                <table class="table">
   
                  <thead>
                    <tr>
                      <th scope="col">{{ __('Name En') }}</th>
                      <th scope="col">{{ __('Name Sr') }}</th>
                      <th scope="col">#</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($genres as $value)   
                    <tr>
                      <td>{{$value->name_en}}</td>
                      <td>{{$value->name_sr}}</td>
                      <td>
                        <a href="{{ route('genre.edit', [$value->id])}}" class="btn btn-success"> {{ __('Edit') }}</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              
              </table>
                
              </div>
          </div>
      </div>
  </div>
</div>





