@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transfer Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transfer Edit</li>
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
		            		<h3 class="card-title">Transfer</h3>
				            <div class="card-tools">
				              <a  href="{{ route('transfer.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Transfer</a>
				            </div>
				      	</div>
		              	<!-- /.card-header -->
		                <div class="card-body">
		                	<div class="bs-stepper-content">
		                		<form action="{{ route('transfer.update', $transfers->id) }}" method="post" enctype="multipart/form-data">
		                			@csrf
		                			<div class="row">
		                				<div class="col-sm-6">
		                					<div class="form-group">
							                  <label>From Account:</label>
							                  <select class="select2" name="form_account" multiple="multiple" data-placeholder="Select a From Account" style="width: 100%;">
							                   	@foreach($bankings as $banking)
							                		<option value="{{ $banking->id }}" @if($transfers->form_account == $banking->id) selected @endif>{{ $banking->bank_name }}</option>
							               		@endforeach
							                  </select>
							                </div>
		                				</div>
		                				<div class="col-sm-6">
		                					<div class="form-group">
							                  <label>To Account:</label>
							                  <select class="select2" name="to_account" multiple="multiple" data-placeholder="Select a To Account" style="width: 100%;">
							                   	@foreach($bankings as $banking)
							                		<option value="{{ $banking->id }}" @if($transfers->to_account == $banking->id) selected @endif>{{ $banking->bank_name }}</option>
							               		@endforeach
							                  </select>
							                </div>
		                				</div>
		                			</div>
		                			<div class="row">
		                				<div class="col-sm-4">
		                					<div class="form-group">
						                       <label for="amount">Amount:</label>
						                       	@error('amount')
		                                            <span class="text-danger">{{ $message }}</span>
		                                        @enderror
						                       <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount" value="{{ $transfers->amount }}">
						                    </div>
		                				</div>
		                				<div class="col-sm-4">
		                					<div class="form-group">
						                       <label for="date">Date:</label>
						                       	@error('date')
		                                            <span class="text-danger">{{ $message }}</span>
		                                        @enderror
						                       <input type="date" class="form-control" name="date" id="date" placeholder="Enter date" value="{{ $transfers->date }}">
			                				</div>
		                				</div>
		                				<div class="col-sm-4">
		                					<div class="form-group">
						                       <label for="reference">Amount:</label>
						                       	@error('reference')
		                                            <span class="text-danger">{{ $message }}</span>
		                                        @enderror
						                       <input type="text" class="form-control" name="reference" id="reference" placeholder="Enter reference" value="{{ $transfers->reference }}">
						                    </div>
		                				</div>
		                			</div>
		                			<div class="row">
		                				<div class="col-sm-12">
		                					<div class="form-group">
						                       <label for="name">Description:</label>
						                       	@error('description')
		                                            <span class="text-danger">{{ $message }}</span>
		                                        @enderror
		                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Enter description">{{ $transfers->description}}</textarea>
						                    </div>
		                				</div>
		                			</div>
	                                <div class="form-group">
	                                    <div class="icheck-success d-inline">
	                                        <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" value="1" {{ $transfers->status == '1' ? 'checked': '' }}>
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