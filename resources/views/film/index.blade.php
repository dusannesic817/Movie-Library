@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <x-message type="{{ session('alertType') }}" message="{{ __(session('alertMsg')) }}" />
            @foreach ($datas as $film)
            <div class="col-12 mb-4">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <div style=""><img src="{{ $film->imgSrc }}" alt="{{ $film->name }}" class="mb-2" style="width: 7.5rem;" /></div>
                                </div>
                                <div class="col-md-10">
                                    <div class="ms-1">
                                        <div class="d-flex flex-column mb-3 mt-3">
                                            <div class="d-flex flex-row">
                                                <div class="p-2" style="font-weight:bold;">{{ $loop->iteration }}.</div>
                                                <div class="p-2"><a href="{{route('film.show',$film)}}" style="margin-left:-0.75rem;text-decoration:none; color:black; font-weight:bold;">{{ $film->name }}</a></div>
                                            </div>
                                            <div class="p-2 d-flex">
                                                <div class="me-3">{{ $film->year }}</div>
                                                <div>{{ $film->running_time }}</div>
                                            </div>
                                            <div class="ms-2"><i class="bi bi-star-fill bi-6x me-1" style="color: rgb(197, 197, 0) "></i> {{ $film->rating }} / 10</div>
                                            <div class="p-2 d-flex mt-2" style="margin-left: -0.7rem">
                                                <ul class="d-flex genre-ul">
                                                    @foreach($film->genres as $g)
                                                        <li class="genre-li">
                                                            <a class="genre-a" href="#">{{$g->name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-end">
                                <form id="deleteForm{{$film->id}}" method="post" action="{{route('film.destroy',$film)}}">
                                    @method('delete')
                                    @csrf
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <a href="{{route('film.edit',$film)}}" >
                                                <i class="bi bi-pencil-fill"></i> 
                                            </a>
                                        </div>
                                        <div class="me-2">
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('deleteForm{{$film->id}}').submit();">
                                                <i class="bi bi-trash-fill"></i> 
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            
                            <div class="d-flex justify-content-end me-2" style="margin-top: 5rem">
                                <a href="{{route('order.create',[$film->copy->id])}}"><i class="bi bi-bag-fill"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-start">
                                <div class="ms-2 me-3 mb-2 d-flex">
                                   <p class="me-2" style="font-weight: bold;">{{ __('Directors')}}:</p>
                                   @foreach($film->directors as $p)
                                   <div class="me-2">{{$p->full_name}}</div>
                                    @endforeach	
                                    
                                </div>
                                
                                <div class="d-flex  me-3">
                                    <p class="me-2"  style="font-weight: bold;">{{ __('Stars')}}:</p>
                                    @foreach($film->stars as $p)
                                    <div class="me-2">{{$p->full_name}}</div>
                                    @endforeach
                                </div>
                                <div class="d-flex">
                                    <p class="me-2" style="font-weight: bold;">{{ __('Writers')}}:</p>
                                    @foreach($film->writers as $p)
                                    <div class="me-2">{{$p->full_name}}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="background-color: rgba(236, 236, 62, 0.514)">
                                <div class="card-body">
                                  This is some text within a card body. Description
                                </div>
                              </div>
                        </div>
                    </div>
                   
                </div>
              </div>
            </div>
          @endforeach
        </div>
        {{ $datas->links() }}
    </div>
@endsection
