@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Role Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Role Add</li>
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
		            		<h3 class="card-title">Role Information</h3>
				            <div class="card-tools">
				              <a  href="{{ route('role.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Role</a>
				            </div>
				      	</div>
		              	<!-- /.card-header -->
		                <div class="card-body">
		                	<div class="bs-stepper-content">
		                		<form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
		                			@csrf

		                			<div class="">
		                				<div class="card-body">
	                						<div class="form-group row">
							                    <label class="col-md-3 col-from-label" for="name">Name</label>
							                    <div class="col-md-9">
							                        <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
							                    </div>
							                </div>
							                <div class="mt-3">
							                	<h5 class="">Permissions</h5>
							                </div>
							                <hr>
							                <div class="bd-example">
											   <ul class="list-group">
											      <li class="list-group-item bg-light" aria-current="true">Clients</li>
											      <li class="list-group-item">
											         <div class="row">
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="add" value="1">
							                                        <label class="form-check-label cursor" for="add">Add New Clients</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="all" value="2">
							                                        <label class="form-check-label cursor" for="all">Show All Clients</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="edit" value="3">
							                                        <label class="form-check-label cursor" for="edit">Clients Edit</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="delete" value="4">
							                                        <label class="form-check-label cursor" for="delete">Clients Delete</label>
							                                    </div>
											               </div>
											            </div>
											         </div>
											      </li>
											   </ul>
											</div><br>
											<div class="bd-example">
											   <ul class="list-group">
											      <li class="list-group-item bg-light" aria-current="true">Notice</li>
											      <li class="list-group-item">
											         <div class="row">
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="add_notice" value="5">
							                                        <label class="form-check-label cursor" for="add_notice">Add New Notice</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="all__notice" value="6">
							                                        <label class="form-check-label cursor" for="all__notice">Show All Notice</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="edit_notice" value="7">
							                                        <label class="form-check-label cursor" for="edit_notice">Notice Edit</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="delete_notice" value="8">
							                                        <label class="form-check-label cursor" for="delete_notice">Notice Delete</label>
							                                    </div>
											               </div>
											            </div>
											         </div>
											      </li>
											   </ul>
											</div><br>
											<div class="bd-example">
											   <ul class="list-group">
											      <li class="list-group-item bg-light" aria-current="true">Department</li>
											      <li class="list-group-item">
											         <div class="row">
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="add_department" value="9">
							                                        <label class="form-check-label cursor" for="add_department">Add New Department</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="all__department" value="10">
							                                        <label class="form-check-label cursor" for="all__department">Show All Department</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="edit_department" value="11">
							                                        <label class="form-check-label cursor" for="edit_department">Department Edit</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="delete_department" value="12">
							                                        <label class="form-check-label cursor" for="delete_ndepartment">Department Delete</label>
							                                    </div>
											               </div>
											            </div>
											         </div>
											      </li>
											   </ul>
											</div><br>
											<div class="bd-example">
											   <ul class="list-group">
											      <li class="list-group-item bg-light" aria-current="true">Attentdance</li>
											      <li class="list-group-item">
											         <div class="row">
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="add_attendance" value="13">
							                                        <label class="form-check-label cursor" for="add_attendance">Add New Attendance</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="all__attendance" value="14">
							                                        <label class="form-check-label cursor" for="all__attendance">Show All Attendance</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="edit_attendance" value="15">
							                                        <label class="form-check-label cursor" for="edit_attendance">Attendance Edit</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="delete_attendance" value="16">
							                                        <label class="form-check-label cursor" for="delete_attendance">Attendance Delete</label>
							                                    </div>
											               </div>
											            </div>
											         </div>
											      </li>
											   </ul>
											</div><br>
											<div class="bd-example">
											   <ul class="list-group">
											      <li class="list-group-item bg-light" aria-current="true">Leave Types</li>
											      <li class="list-group-item">
											         <div class="row">
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="add_leave" value="17">
							                                        <label class="form-check-label cursor" for="add_leave">Add New Leave</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="all__leave" value="18">
							                                        <label class="form-check-label cursor" for="all__leave">Show All Leave</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="edit_leave" value="19">
							                                        <label class="form-check-label cursor" for="edit_leave">Leave Edit</label>
							                                    </div>
											               </div>
											            </div>
											            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
											               <div class="p-2 border mt-1 mb-4 checkbox_custom">
											                  	<div class="icheck-success p-3">
							                                        <input type="checkbox" class="form-check-input me-2 cursor" name="permissions[]" id="delete_leave" value="20">
							                                        <label class="form-check-label cursor" for="delete_leave">Leave Delete</label>
							                                    </div>
											               </div>
											            </div>
											         </div>
											      </li>
											   </ul>
											</div><br>
						                    <button type="submit" class="btn btn-primary mt-4" style="float: right;">Add Now</button>
										</div>
								    </div>
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