
    {{$list}}
@foreach ($list->member as $m)

    @if ($m->pivot->status==1) {{-- ovde sam sad pokupio pivot podatke za status da li je vratila film ili ne tako da dalje mogu da rokam--}}
        <p>{{$m->name}}</p>  
    @else
        <p>{{'no name'}}</p>
    
        
    @endif
   
   
    @endforeach
