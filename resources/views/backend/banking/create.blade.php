@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banking Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banking Add</li>
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
		            		<h3 class="card-title">Banking</h3>
				            <div class="card-tools">
				              <a  href="{{ route('banking.index') }}" class="btn btn-success col-12 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>All Banking</a>
				            </div>
				      	</div>
		              	<!-- /.card-header -->
		                <div class="card-body">
		                	<div class="bs-stepper-content">
		                		<form action="{{ route('banking.store') }}" method="post" enctype="multipart/form-data">
		                			@csrf
			                		<div class="form-group">
				                       <label for="holder_name">Bank Holder Name:</label>
				                       	@error('holder_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="holder_name" id="holder_name" placeholder="Enter holder name" value="{{old('holder_name')}}">
				                    </div>
				                    <div class="form-group">
				                       <label for="bank_name">Bank Name:</label>
				                       	@error('bank_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter bank name" value="{{old('bank_name')}}">
				                    </div>
				                    <div class="form-group">
				                       <label for="account_no">Account Number:</label>
				                       	@error('account_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="text" class="form-control" name="account_no" id="account_no" placeholder="Enter bank account number" value="{{old('account_no')}}">
				                    </div>
				                    <div class="form-group">
				                       <label for="opening_balance">Opening Balance:</label>
				                       	@error('opening_balance')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="number" class="form-control" name="opening_balance" id="opening_balance" placeholder="Enter opening balance" value="{{old('opening_balance')}}">
				                    </div>
				                    <div class="form-group">
				                       <label for="phone">Contact Number:</label>
				                       	@error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
				                       <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter contact number" value="{{old('phone')}}">
				                    </div>
				                    <div class="form-group">
				                       <label for="address">Bank Address:</label>
				                       	@error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <textarea name="address" id="address" cols="3" rows="3" class="form-control" placeholder="Enter bank address">{{ old('address') }}</textarea>
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