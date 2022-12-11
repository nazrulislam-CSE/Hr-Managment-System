@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Types List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leave Type List</li>
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
	            		<h3 class="card-title">Leave</h3>
			            <div class="card-tools">
			              <a  href="{{ route('leave.create') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Add Leave</a>
			            </div>
			      	</div>
	              <!-- /.card-header -->
	                <div class="card-body">
		                <table id="example1" class="table table-bordered table-hover table-striped">
		                  <thead>
		                      <tr>
		                        <th>Sl</th>
		                        <th>Name</th>
		                        <th>Leaves</th>
		                        <th>Description</th>
		                        <th>Status</th>
		                        <th>Action</th>
		                      </tr>
		                  </thead>
		                  <tbody>
		                    @foreach($leaves as $key => $leave)
		                        <tr>
		                            <td>{{ $key+1}}</td>
		                            <td>{{ $leave->name ?? 'NULL' }}</td>
		                            <td>{{ $leave->leaves ?? 'NULL' }}</td>
		                            <td>{{ $leave->description ?? 'NULL' }}</td>
		                            <td>
		                                @if($leave->status == 1)
		                                  <a href="{{ route('leave.in_active',['id'=>$leave->id]) }}" class="btn btn-success btn-sm">Active</a>
		                                @else
		                                  <a href="{{ route('leave.active',['id'=>$leave->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
		                                @endif
		                            </td>
		                            <td>
		                                <a href="{{ route('leave.edit',$leave->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

		                                <a data-toggle="modal" data-target="#delete-modal{{ $leave->id }}" href="{{ route('leave.delete',$leave->id ) }}" id="delete" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>

		                                <!-- Start Delete Menu Modal -->
		                                <div class="modal fade" id="delete-modal{{ $leave->id }}">
		                                    <div class="modal-dialog">
		                                      <div class="modal-content bg-primary">
		                                        <div class="modal-header">
		                                          <h4 class="modal-title">Leave Deleted?</h4>
		                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                            <span aria-hidden="true">&times;</span>
		                                          </button>
		                                        </div>
		                                        <div class="modal-body bg-light">
		                                          <p>Are you sure Leave Permanently Deleted?</p>
		                                        </div>
		                                        <div class="modal-footer justify-content-between bg-light">
		                                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
		                                          <a type="button" href="{{ route('leave.delete',['id'=>$leave->id]) }}" class="btn btn-primary"><i style="margin-right: 5px; color: white;" class="fas  fa-trash"></i><span class="text-light">OK</span></a>
		                                        </div>
		                                      </div>
		                                      <!-- /.modal-content -->
		                                    </div>
		                                </div>
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