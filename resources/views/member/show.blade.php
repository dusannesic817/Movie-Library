@extends('layouts.app')


@section('content')
    <x-container>

       
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-2 mt-2"><img src="/storage/profile/profile.png" style="max-width: 50%;"></div>
                            <div class="mb-2"><h4>{{$member->name . " ". $member->surname}}</h4></div>
                            <div class="mb-2"><small>{{$member->city.', '.$member->address}}</small></div>                       
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                          <div class="border-bottom">Payment Information</div>
                          
                          <div class="mt-4 mb-2">Total Spent Money: {{$totalSpent}} $</div>
                          <div>Debt: {{$totalDebt}} $</div>
                            
                           <div class="mt-5" style="text-align:center">
                            <a  class="btn" href="##" style="background-color: rgba(4,83,124,255); color:white">Payment Buttons</a>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
    
                                <tbody>
                                  <tr>
                                    <th scope="row">First Name</th>
                                    <td>{{$member->fullName}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Adress</th>
                                    <td>{{$member->city.', '.$member->address}}</td>
                                  
                                  </tr>
                                  <tr>
                                    <th scope="row">Email</th>
                                    <td colspan="2">email@gmail.com</td>
                                   
                                  </tr>
                                  <tr>
                                    <th scope="row">Number</th>
                                    <td colspan="2">061236558</td>
                                   
                                  </tr>
                                  <tr>
                                    <th scope="row">Id Number</th>
                                    <td colspan="2">{{$member->id_number}}</td>
                                   
                                  </tr>
                                  <tr>
                                    <th scope="row">Birth</th>
                                    <td colspan="2">{{$member->date}}</td>
                                   
                                  </tr>
                           
                                </tbody>
                              </table>
                              <div class="d-flex pt-2" style="margin-bottom: -10px;">
                              <p style="margin-left: 10px; font-weight:bold">Favorite Genres:</p>

                             <ul class="d-flex genre-ul">
                              @foreach ($favorites as $favorite)
                              <li class="genre-li">
                                <a class="genre-a" href="#">{{$favorite}}</a>
                              </li>
                              @endforeach
                             </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                 <p class="border-bottom mb-3">Last 5 Films</p>
                                 @foreach ($lastFive as $item)
                                 <div>{{$item}}</div>
                                 @endforeach
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                  <p class="border-bottom mb-3">Owes</p>
                                  @foreach ($owes as  $item)
                                  <div><a href="{{route('order.edit',[$item['order_id']])}}">{{$item['film_name']}}</a></div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
        


    </x-container>
@endsection