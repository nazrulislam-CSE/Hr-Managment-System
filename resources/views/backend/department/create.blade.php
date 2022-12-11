@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Departments Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="content">
	    <div class="container-fluied">
	    	<div class="row mt-3">
		       <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
		            <div class="card card-primary card-outline shadow py-3">
		            	<div class="card-header">
		            		<h3 class="card-title">Departments</h3>
				            <div class="card-tools">
				              <a  href="{{ route('department.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Department</a>
				            </div>
				      	</div>
		              	<!-- /.card-header -->
		                <div class="card-body">
		                	<div class="bs-stepper-content">
		                		<form action="{{ route('department.store') }}" method="post" enctype="multipart/form-data">
		                			@csrf
			                		<div class="form-group">
				                       <label for="name">Name:</label>
				                       	@error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
				                    </div>
				                    <div class="form-group">
				                       <label for="designations">Designations:</label>
				                       	@error('designations')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="designations" id="designations" placeholder="Enter designations">
				                    </div>
				                    <div class="form-group">
				                       <label for="name">Description:</label>
				                       	@error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Enter description"></textarea>
				                    </div>
	                                <div class="form-group">
	                                    <div class="icheck-success d-inline">
	                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" value="1">
	                                        <label class="form-check-label cursor" for="status">Status</label>
	                                    </div>
				                    </div>
				                    <button type="submit" class="btn btn-primary mt-4" style="float: right;">Add Now</button>
			                    </form>
	                  		</div>
		              	</div>
		            </div>
		       </div>
		    </div>
	    </div>
	</div>
	<!-- /.content -->
</div>
@endsection