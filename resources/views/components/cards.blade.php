@props(['member', 'sales', 'sum'])

<div class="container">
    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card" style="background-color:white;">
                <div class="card-body">
                    <h5 class="card-title">{{ __("Sales") }}</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-cart"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$sales}}</h6>
                      
  
                      </div>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card" style="background-color:white;">
                <div class="card-body">
                    <h5 class="card-title">{{ __("Revenue") }}</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$sum}}</h6>
                     
  
                      </div>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card" style="background-color:white;">
                <div class="card-body">
                    <h5 class="card-title">{{ __("Members") }}</h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>{{$member}}</h6>
                        
  
                      </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
