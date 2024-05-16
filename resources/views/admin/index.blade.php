@extends('layouts.app')


@section('content')
  
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card" style="background-color:white;">
                    <div class="card-body">
                        <h5 class="card-title">Sales <span>| Today</span></h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                          </div>
                          <div class="ps-3">
                            <h6>145</h6>
                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
      
                          </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card" style="background-color:white;">
                    <div class="card-body">
                        <h5 class="card-title">Revenue <span>| This Month</span></h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-currency-dollar"></i>
                          </div>
                          <div class="ps-3">
                            <h6>145</h6>
                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
      
                          </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card" style="background-color:white;">
                    <div class="card-body">
                        <h5 class="card-title">Customers <span>| This Year</span></h5>

                        <div class="d-flex align-items-center">
                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                          </div>
                          <div class="ps-3">
                            <h6>145</h6>
                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
      
                          </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

@endsection

