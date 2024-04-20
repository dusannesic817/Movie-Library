@include('layouts.app')



<div class="card-body">

    <table class="table">

      <thead>
        <tr>
          <th scope="col">{{ __('Name') }}</th>
          <th scope="col">{{ __('Year') }}</th>
          <th scope="col">{{ __('Runing') }}</th>  
          <th scope="col">{{ __('Rating') }}</th>
          <th scope="col">{{ __('Genres') }}</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
       
        <tr>
          <td>{{$film->name}}</td>
          <td>{{$film->year}}</td>
          <td>{{$film->runing_h . "h " .$film->runing_m . "m"}}</td>
          <td>{{$film->rating}}</td>
          <td>
            @foreach($film->genres as $ganre)
            {{$ganre->name}}
                
            @endforeach
        </td>
        </tr>
  
      </tbody>
  
  </table>


  </div>