@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="content">
	    <div class="container-fluied">
	      <div class="row mt-3">
	       <div class="col-12">
	            <div class="card card-primary card-outline shadow py-3">
	            	<div class="card-header">
	            		<h3 class="card-title">Employe</h3>
			            <div class="card-tools">
			              <a  href="{{ route('employe.create') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Employe</a>
			            </div>
			      	</div>
	              <!-- /.card-header -->
	                <div class="card-body">
		                <table id="example1" class="table table-bordered table-hover table-striped">
		                  <thead>
		                      <tr>
		                        <th>Sl</th>
		                        <th>Image</th>
		                        <th>Name</th>
		                        <th>Mobile</th>
		                        <th>Address</th>
		                        <th>Action</th>
		                      </tr>
		                  </thead>
		                  <tbody>
		                    @foreach($employes as $key => $employe)
		                        <tr>
		                            <td>{{ $key+1}}</td>
		                            <td class="col-1">
		                            	<img src="{{ asset($employe->employe_image)}}" width="80" height="60">
		                            </td>
		                            <td>{{ $employe->name ?? 'NULL' }}</td>
		                            <td>{{ $employe->phone ?? 'NULL' }}</td>
		                            <td>{{ $employe->address ?? 'NULL' }}</td>
		                            <td>
		                                <a href="{{ route('employe.sallary.index',$employe->id) }}" class="btn btn-sm btn-info mr-2">Sallary</a>
		                            </td>
		                        </tr>
		                    @endforeach
		                  </tfoot>
		                </table>
	              	</div>
	            </div>
	        </div>
	      </div>
	    </div>
	</div>
	<!-- /.content -->
</div>
@endsection