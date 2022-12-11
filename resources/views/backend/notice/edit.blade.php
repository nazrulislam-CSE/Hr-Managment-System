@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notice Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notice Edit</li>
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
		            		<h3 class="card-title">Notice</h3>
				            <div class="card-tools">
				              <a  href="{{ route('notice.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Notice</a>
				            </div>
				      	</div>
		              	<!-- /.card-header -->
		                <div class="card-body">
		                	<div class="bs-stepper-content">
		                		<form action="{{ route('notice.update', $notices->id) }}" method="post" enctype="multipart/form-data">
		                			@csrf
			                		<div class="form-group">
				                       <label for="title">Title:</label>
				                       	@error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" name="title" class="form-control" title="title" id="title" placeholder="Enter title" value="{{ $notices->title }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="date">Date:</label>
				                       	@error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="date" class="form-control" name="date" id="date" placeholder="Enter date" value="{{ $notices->date }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="name">Description:</label>
				                       	@error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Enter description">{{ $notices->description }}</textarea>
				                    </div>
	                                <div class="form-group">
	                                    <div class="icheck-success d-inline">
	                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" value="1" {{ $notices->status == 1 ? 'checked': '' }}>
	                                        <label class="form-check-label cursor" for="status">Status</label>
	                                    </div>
				                    </div>
				                    <button type="submit" class="btn btn-primary mt-4" style="float: right;">Update Now</button>
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