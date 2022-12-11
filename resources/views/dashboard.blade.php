@extends('layouts.app2')
@section('dashboard') active @endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-light shadow-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <div>
              <span class="mr-2"><a target="_blank" href="{{ route('admin.dashboard') }}">Dashboard</a></span>
            </div>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content mt-3">
      <div class="container-fluid">
        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ DB::table('clients')->count() }}</h3>
                <p>New Clients</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="{{ route('client.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ DB::table('employes')->count() }}</h3>
                <p>Employes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('employe.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ DB::table('roles')->count() }}</h3>
                <p>Roll Premessions</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('role.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ DB::table('departments')->count() }}</h3>
                <p>Departments</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="{{ route('department.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ DB::table('notices')->count() }}</h3>
                <p>New Notice</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="{{ route('notice.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ DB::table('leaves')->count() }}</h3>
                <p>Leaves Types</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('leave.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ DB::table('bankings')->count() }}</h3>
                <p>Banking</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('banking.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-sm-6 col-md-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ DB::table('transfers')->count() }}</h3>
                <p>Transfer</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="{{ route('transfer.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
    
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg"></span>
                    <span></span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted"></span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                
                  <a href="javascript:void(0);"></a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                      <span class="text-bold text-lg">
                        10
                        </span>
                    <span></span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 
                    </span>
                    <span class="text-muted"></span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection