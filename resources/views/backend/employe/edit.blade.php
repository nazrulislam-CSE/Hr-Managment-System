@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employe Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="content">
	    <div class="container-fluied">
	    	<div class="row mt-3">
		       <div class="col-12 col-lg-10 offset-lg-1 col-md-10 offset-md-1">
		            <div class="card card-primary card-outline shadow py-3">
		            	<div class="card-header">
		            		<h3 class="card-title">Employees</h3>
				            <div class="card-tools">
				              <a  href="{{ route('employe.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Employe</a>
				            </div>
				      	</div>
		              	<!-- /.card-header -->
		                <div class="card-body">
		                	<div class="bs-stepper-content">
		                		<form action="{{ route('employe.update', $employes->id) }}" method="post" enctype="multipart/form-data">
		                			@csrf
			                		<div class="form-group">
				                       <label for="name">Name:</label>
				                       	@error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ $employes->name }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="username">Username:</label>
				                       	@error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="{{ $employes->username }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="phone">Phone:</label>
				                       	@error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="{{ $employes->phone }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="address">Address:</label>
				                       	@error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" value="{{ $employes->address }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="address">Gender:</label>
				                       	@error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                        <div class="icheck-danger d-inline">
					                        <input type="radio" name="gender" value="male" checked id="radioDanger1" {{ $employes->gender == 'male' ? 'checked': '' }}>
					                        <label for="radioDanger1">
					                        	Male
					                        </label>
					                    </div>
					                    <div class="icheck-danger d-inline">
					                        <input type="radio" name="gender" value="female" id="radioDanger2">
					                        <label for="radioDanger2" {{ $employes->gender == 'female' ? 'checked': '' }}>
					                        	Female
					                        </label>
					                    </div>
				                      </div>
				                    </div>
				                    <div class="form-group">
				                       <label for="email">Date of Birth:</label>
				                      	@error('date_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="date" class="form-control" id="date_birth" name="date_birth" placeholder="Enter date of birth" value="{{ $employes->date_birth }}">
				                    </div>
				                    <div class="form-group">
					                  <label>User Role:</label>
					                  <select class="select2" name="role_id" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;">
					                    @foreach($roles as $role)
					                		<option value="{{ $role->id }}"  @if($employes->role_id == $role->id) selected @endif>{{ $role->name }}</option>
					               		@endforeach
					                  </select>
					                </div>
					                <div class="form-group">
					                  <label>Departments:</label>
					                  <select class="select2" name="department_id" multiple="multiple" data-placeholder="Select a Department" style="width: 100%;">
					                   	@foreach($departments as $department)
					                		<option value="{{ $department->id }}" @if($employes->department_id == $department->id) selected @endif>{{ $department->name }}</option>
					               		@endforeach
					                  </select>
					                </div>
					                <div class="form-group">
					                  <label>Designation:</label>
					                  <select class="select2" name="designation_id" multiple="multiple" data-placeholder="Select a Designation" style="width: 100%;">
					                    	@foreach($departments as $department)
					                			<option value="{{ $department->id }}" @if($employes->designation_id == $department->id) selected @endif>{{ $department->designations }}</option>
					               			@endforeach
					                  </select>
					                </div>
					                <div class="form-group">
				                       <label for="joing_date">Date Of Joining:</label>
				                      	@error('joing_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="date" class="form-control" id="joing_date" name="joing_date" placeholder="Enter date of birth" value="{{ $employes->joing_date }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="joing_salary">Joining Salary:</label>
				                       	@error('joing_salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="number" class="form-control" name="joing_salary" id="joing_salary" placeholder="Enter Joining Salary"  value="{{ $employes->joing_salary }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="expense">Expense:</label>
				                       	@error('expense')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="expense" id="expense" placeholder="Enter expense" value="{{ $employes->expense }}">
				                    </div>
			                		<div class="form-group">
				                       <label for="email">Email address:</label>
				                       	@error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ $employes->email }}">
				                    </div>
				                    <div class="form-group">
				                       <label for="exampleInputPassword1">Password</label>
				                       	@error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
				                    </div>
				                    <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
				                    	<div class="form-group">
				                        	<label for="client_image">Profile Image</label>
				                        	@error('client_image')
                                            	<span class="text-danger">{{ $message }}</span>
                                        	@enderror
					                        <div class="mb-2">
								             	<img id="showImage" class="rounded avatar-lg" src="{{ asset($employes->employe_image)}}" alt="No Image" width="100px" height="80px;">
								            </div>
					                        <div class="input-group">
					                          <div class="custom-file">
					                            <input type="file" class="custom-file-input" name="employe_image" id="employe_image">
					                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
					                          </div>
					                          <div class="input-group-append">
					                            <span class="input-group-text">Upload</span>
					                          </div>
					                      	</div>
				                      	</div>
	                                </div>
	                                <div class="form-group">
	                                    <div class="icheck-success d-inline">
	                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" value="1" {{ $employes->status == '1' ? 'checked': '' }}>
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

@push('footer-script')
<!--Site favicon Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#employe_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endpush