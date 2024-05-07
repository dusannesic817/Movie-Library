
<tr>
    <th scope="row">{{$loop}}</th>
    <td style="text-align: center;"><img src="{{ $film->imgSrc }}" alt="{{ $film->name }}" class="mb-2" style="width: 100px;" /></td>
    <td><a href="{{route('film.show',$film)}}" >{{ $film->name }}</a>
    
        <p class="m-0"><strong>{{ __('Directors')}}:</strong>
        @foreach($film->directors as $p)
            {{ $p->full_name}}
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