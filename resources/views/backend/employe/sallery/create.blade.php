@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>
                  Add Employees Sallary
               </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                  <li class="breadcrumb-item active">
                     Add Employees Sallary
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-sm-6">
                  <h3 class="card-title">
                     Add Employees Sallary
                  </h3>
               </div>
               <div class="col-sm-6 text-right">
                  <a href="{{ route('employe.sallary') }}" class="btn btn-danger">
                  <i class="fas fa-long-arrow-alt-left"></i>
                  Back to List
                  </a>
               </div>
            </div>
          </div>

          <form action="{{ route('employe_sallary.store') }}" method="POST">
            @csrf  
            <div class="row m-4">
              <div class="form-group col-md-6">
                <label for="name">Employe Name:</label>
                <input type="text" id="name" class="form-control " value="{{ $info->name }}" >
                <input type="hidden" name="employe_id" id="name" class="form-control " value="{{ $info->id }}" >
              </div>

              <div class="form-group col-md-6">
                <label for="designation">Designation:</label>
                <input type="text" name="designation" id="designation"  class="form-control " value="{{ $info->designation }}" >
              </div>

              <div class="form-group col-md-6">
                <label for="mobile_no">Mobile No:</label>
                <input type="number" name="phone" id="mobile_no"  class="form-control " value="{{ $info->phone }}" >
              </div>

              <div class="form-group col-md-6">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address"  class="form-control " value="{{ $info->address }}" >
              </div>

              <div class="form-group col-md-4">
                <label for="sallary">Salary:</label>
                <input type="number" name="sallary" id="sallary"  class="form-control " value="{{ $info->sallary }}" >
              </div>

              <div class="form-group col-md-4">
                <label for="absent_days">Absent Days:</label>
                <input type="number" name="absent_days" id="absent_days"  class="form-control " value="" >
              </div>

              <div class="form-group col-md-4">
                <label for="bonus_commission">Bonus/Commission:</label>
                <input type="text" name="bonus_commission" id="bonus_commission"  class="form-control " value="" >
              </div>

             
              <div class="form-group col-md-3">
                 <label>Month</label>
                  <select class="form-control" name="month">
                    <option value="">Select Month</option>
                     <?php
                       for($m=1; $m<=12; $m++){
                         echo '<option value="'.date('F', mktime(0, 0, 0, $m)).'">'
                         .date('F', mktime(0, 0, 0, $m)).
                         '</option>';
                       }
                     ?>
                  </select>
              </div>
             
              <div class="form-group col-md-3">
                 <label>Year</label>
                  <select class="form-control" name="year">
                    <option value="">Select Year</option>
                     <?php
                       $current_year = date('Y');
                        for ($count = $current_year; $count >=2022; $count--)
                        {
                            echo "<option value='{$count}'>{$count}</option>";
                        }
                     ?>
                  </select>
              </div>

              <div class="form-group col-md-6">
                <label for="pay_salary">Pay:</label>
                <input type="text" name="pay_amount" id="pay_salary"  class="form-control">
              </div>

              

            </div>   
            <div class="card-footer m-2">
               <div class="form-group">
                  <button class="mt-1 btn btn-primary">
                  <i class="fas fa-plus-circle"></i>
                  Submit
                  </button>
               </div>
            </div>
         </form>
      </div>
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@push('footer-script')
<script>

    $(document).on('keyup', '#absent_days',function(){
        var absent_days =  $('#absent_days').val();
        var salary =  $('#sallary').val();
        var salary_rate = salary/30;
        var days_salary = absent_days*salary_rate;
        var lose_salary = salary-days_salary;
        $('#sallary_rate').val(salary_rate);
        $('#pay_salary').val(lose_salary);
      });

    $(document).on('blur', '#bonus_commission',function(){
        var pay_salary = $('#pay_salary').val();
        var bonus_commission = $('#bonus_commission').val();
        var final = parseInt(pay_salary)+parseInt(bonus_commission);
        $('#pay_salary').val(final);
      });

</script>
@endpush


@endsection