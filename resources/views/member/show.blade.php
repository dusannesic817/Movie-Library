@extends('layouts.app')


@section('content')
    <x-container>

       
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="mb-2 mt-2"><img src="/storage/profile/profile.png" style="max-width: 50%;"></div>
                            <div class="mb-2"><h4>Dusan Nesic</h4></div>
                            <div class="mb-2"><small>Cuprija, Cetinjska 4</small></div>                       
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                          <div class="border-bottom">Payment Information</div>
                          
                          <div class="mt-4">Spent Money</div>
                          <div>Owes</div>
                            
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
                                    <td>Mark Otto</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Adress</th>
                                    <td>Jacob</td>
                                  
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
                                    <td colspan="2">061236558</td>
                                   
                                  </tr>
                                  <tr>
                                    <th scope="row">Birth</th>
                                    <td colspan="2">27-May-1995</td>
                                   
                                  </tr>
                           
                                </tbody>
                              </table>
                              <div class="d-flex pt-2" style="margin-bottom: -10px;">
                              <p style="margin-left: 10px; font-weight:bold">Favorite Genres:</p>
                             <ul class="d-flex genre-ul">
                              
                              <li class="genre-li">
                                <a class="genre-a" href="#">Action</a>
                              </li>
                              <li  class="genre-li">
                                <a class="genre-a" href="#">Comedia</a>
                              </li>
                              <li  class="genre-li">
                                <a class="genre-a" href="#">Comedia</a>
                              </li>

                             </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                 <p class="border-bottom">Last 5 Films</p>
                                 <div class="mt-4">List of movies</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    Owes movies
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
        


    </x-container>
@endsection