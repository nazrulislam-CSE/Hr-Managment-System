@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>
                  Product And Services
               </h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">
                     Product And Services
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
                     Add New Product
                  </h3>
               </div>
               <div class="col-sm-6 text-right">
                  <a href="#" class="btn btn-danger">
                  <i class="fas fa-long-arrow-alt-left"></i>
                  Back to List
                  </a>
               </div>
            </div>
         </div>

         <div class="row m-2">
            <div class="col-md-12">
               <div class="card">
                  <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                     <div class="card-body">
                        <table class="table table-bordered">
                           <tr class="bg-primary text-center">
                              <th>Items</th>
                              <th>Description</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Discount</th>
                              <th>Total Price</th>
                              <th>Action</th>
                           </tr>

                           <div class="add_item">
                              <tr>
                                <td class="col-md-2">
                                    <select class="form-select form-control multipleSelect" aria-label="Default select example" name="item_id[]">
                                      <option selected>Select a Item</option>
                                       <option value="product1">Product 1</option>
                                       <option value="product2">Product 2</option>
                                       <option value="product3">Product 3</option>
                                       <option value="product4">Product 4</option>
                                    </select>
                                    @error('item_id')
                                     <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </td>

                                 <td class="col-md-2">
                                    <div class="form-group">
                                      @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                      <textarea name="description[]" class="form-control" rows="1"></textarea>
                                    </div>
                                 </td>

                                <td class="col-md-1">
                                   <div class="form-group">
                                      <input type="text"  name="qty[]" class="form-control bg-light qty" value="0">
                                     
                                   </div>
                                </td>

                                 <td class="col-md-2">
                                   <div class="form-group">
                                      <input type="text"  name="unit_price[]" class="form-control bg-light item_unit_price" value="0">
                                     
                                   </div>
                                 </td>


                                 <td class="col-md-2">
                                   <div class="form-group">
                                       <input type="text" name="single_discount[]" class="form-control bg-light item_single_discount" value="0">
                                        @error('single_discount')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                   </div>
                                 </td>

                                 <td class="col-md-2">
                                   <div class="form-group">
                                       <input type="text"  name="total_price[]" class="form-control bg-light item_total_price" value="0">
                                   </div>
                                 </td>

                                 <td class="col-md-1">
                                    <button type="button" class="mt-1 btn btn-success btn-sm" id="add_row_sale">
                                      <span class="addeventmore"><i class="fa fa-plus-circle"></i></span>
                                    </button>
                                 </td>
                              </tr>                           
                           </div>

                        <tfoot>
                          <tr>
                            <td colspan="4"></td>
                            <td>Sub Total:</td>
                            <td>
                              <input type="text" name="subtotal" class="form-control subtotal" value="0" readonly>
                            </td>
                          </tr>

                          <tr>
                             <td colspan="4"></td>
                             <td>Vat:</td>
                             <td>
                                 <!-- vat -->
                                <div class="form-group col-md-12">
                                   <input type="text" name="total_vat" id="total_vat" class="form-control" placeholder="%" value="0">
                                   @error('total_vat')
                                     <span class="text-danger">{{ $message }}</span>
                                   @enderror
                                </div>
                             </td>
                          </tr>
                          <tr class="d-none">
                            <td colspan="4"></td>
                            <td>Vat Amount:</td>
                            <td>
                              <input type="text" name="vat_amount" id="vat_amount" class="form-control" value="0">
                            </td>
                          </tr>

                          <tr>
                            <td colspan="4"></td>
                            <td>Discount:</td>
                            <td>
                              <input type="text" name="total_discount" class="form-control discount" placeholder="Tk." value="0">
                              @error('total_discount')
                               <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </td>
                          </tr>


                          <tr>
                            <td colspan="4"></td>
                            <td>Total Amount:</td>
                            <td>
                              <input type="text" name="total_amount" class="form-control total_amount" value="0">
                            </td>
                          </tr>

                          <tr>
                            <td colspan="4"></td>
                            <td>Paid Amount:</td>
                            <td>
                              <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="0" value="0">
                               @error('paid_amount')
                               <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </td>
                          </tr>

                           <tr>
                            <td colspan="4"></td>
                            <td>Payment Method:</td>
                            <td>
                              <select class="form-select form-control payment_method" id="payment_method" name="payment_method" onchange="paymentChange()">
                                 <option value="">Select a Payment</option>
                                 <option value="cash">Cash</option>
                                 <option value="bkash">Bkash</option>
                                 <option value="nagod">Nagod</option>
                                 <option value="bank">Bank</option>
                              </select>
                            </td>
                          </tr>

                          <tr class="d-none">
                            <td colspan="4"></td>
                            <td>Payment Charge:</td>
                            <td>
                              <input type="text" name="payment_charge"  class="form-control payment_charge">
                            </td>
                          </tr>

                          <tr class="d-none" id="payment_account">
                            <td colspan="4"></td>
                            <td>Account No:</td>
                            <td>
                              <input type="text" name="account_no" class="form-control account_no" placeholder="0">
                            </td>
                          </tr> 

                          <tr>
                            <td colspan="4"></td>
                            <td>Due Amount:</td>
                            <td>
                              <input type="text" name="due_amount" class="form-control due_amount" placeholder="0" readonly>
                            </td>
                          </tr>

                            <?php
                              use Carbon\Carbon;
                              $date = date('Y');
                              $month = date('F');
                            ?>
                          <tr class="d-none">
                            <td colspan="5"></td>
                            <td>
                              <input type="hidden" name="year" value="<?php echo $date; ?>">
                            </td>
                          </tr>

                          <tr class="d-none">
                            <td colspan="5"></td>
                            <td>
                              <input type="hidden" name="month" value="<?php echo $month; ?>">
                            </td>
                          </tr>

                           <tr>
                              <td colspan="5"></td>
                              <td>
                                 <button type="submit" class="btn btn-primary btn-md" style="float: right;">Submit</button>
                              </td>
                           </tr>

                        </tfoot>

                        </table>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- /.card -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@push('footer-script')
<script type="text/javascript">

    $(document).ready(function(){
        $('#payment_method').change(function(){
        var selectedValue = $(this).find(':selected').val();
        var paid_amount = $('.paid_amount').val();

        if(selectedValue=='bkash'){
            var payment_charge_value = (paid_amount/100) * 1.5;
            $('.payment_charge').val(payment_charge_value);
         }
         else if(selectedValue=='nagod'){
               var payment_charge_value = (paid_amount/100) * 1.2;
               $('.payment_charge').val(payment_charge_value);
         }
         else if(selectedValue='bank'){
               var payment_charge_value = (paid_amount/100) * 0;
               $('.payment_charge').val(payment_charge_value);
         }
         else if(selectedValue='cash'){
               var payment_charge_value = (paid_amount/100) * 0;
               $('.payment_charge').val(payment_charge_value);
          }
         else{
             $('.payment_charge').val('00');
         }

        });

    });

    // Payment Type
        function paymentChange() {
           var payment_method = $('#payment_method').val();

            if(payment_method == 'bkash' || payment_method == 'nagod' || payment_method == 'bank'){
               $('#payment_account').removeClass('d-none');
            }else{
               $('#payment_account').addClass('d-none')
            }
        }

 // repeated data

$('#add_row_sale').on('click',function(){
      AddRowPosfunction();
   });

   function AddRowPosfunction(){
    var tr = '<tr>'+
              '<td class="col-lg-2"><select class="form-select form-control multipleSelect" aria-label="Default select example" name="item_id[]"><option selected>Select a Item</option><option value="product1">Product 1</option><option value="product1">Product 2</option><option value="product1">Product 3</option><option value="product1">Product 4</option></select></td>'+
              
              '<td class="col-lg-2"><div class="form-group"><textarea name="description[]" class="form-control" rows="1"></textarea></div></td>'+
              
              '<td class="col-lg-1"><div class="form-group"><input type="text"  name="qty[]" class="form-control bg-light qty" value="0"></div></td>'+

             ' <td class="col-lg-2"><input type="text" name="unit_price[]" class="form-control bg-light item_unit_price" value="0" </td>'+


             ' <td class="col-lg-1"><input type="text" name="single_discount[]" class="form-control bg-light item_single_discount" value="0"></td>'+

             '<td class="col-lg-2"><input type="text" name="total_price[]" class="form-control item_total_price" placeholder="0" value="0"></td>'+

             '<td class="col-lg-1"><a class="btn btn-xs btn-danger remove_sale" style="background: red;"><i class="fa fa-minus-circle"></i></a></td>'

            '</tr>';
            $('tbody').append(tr);
            $('.select2').select2();
    }

   // remove row
    $(document).on('click','.remove_sale', function(){
        $(this).closest('tr').remove();
        saleCalculation();
    });

    // items unit price change
    $(document).on('change', '.item_unit_price',function(){
        saleCalculation(this);
    });

    // items discount change
    $(document).on("change", ".item_single_discount", function() {
        saleCalculation(this);
    });


    function saleCalculation(item = null){
        var parent = $(item).closest('tr');

        var qty =  parseFloat(parent.find('.qty').val());
        var unitPrice =  parseFloat(parent.find('.item_unit_price').val());
        var total_unit_Price = qty * unitPrice; 
        var discount =  parseFloat(parent.find('.item_single_discount').val());
         var totalSalePrice = total_unit_Price - discount;

        parent.find('.item_total_price').val(totalSalePrice);

        // sub total
        var subTotal = 0;
        $('.item_total_price').each(function(){
            subTotal += parseFloat($(this).val())
        })
        $('.subtotal').val(subTotal);


         // single discount total
        var totalSingleDiscount = 0;
        $('.item_single_discount').each(function(){
            totalSingleDiscount += parseFloat($(this).val())
        })
        $('.discount').val(totalSingleDiscount);


        // vat
        var subtotal = parseFloat($('.subtotal').val());
        var total_vat_value = parseFloat($('#total_vat').val());

        if(total_vat_value!='0'){
           var VatValuePrice = (subtotal/100) * total_vat_value;
           var VatPrice = subtotal+VatValuePrice;
           $('.total_amount').val(VatPrice);
           var vat_amount = VatPrice-subtotal;
           $('#vat_amount').val(vat_amount);
        }else{
            var VatValuePrice = (subtotal/100) * total_vat_value;
            var  VatPrice = subtotal+VatValuePrice;
           $('.total_amount').val(VatPrice);
        }

        //due amount
        var paid_amount =  $('.paid_amount').val();
        var total_amount =  $('.total_amount').val();
        if(paid_amount!='0'){
            var total_due_amount = total_amount-paid_amount;
        $('.due_amount').val(total_due_amount);
        }else{
        $('.due_amount').val('0');
        }


        // // discount
        // var DiscountValue = $('.discount').val();
        // var TotalAmount = $('.total_amount').val();
        // var TotalDiscount = TotalAmount - DiscountValue;
        // $('.total_amount').val(TotalDiscount);
    }


    // paid amount
    $(document).on('change', '.paid_amount',function(){
        saleCalculation();
    });

    //toal discount taka  
    $(document).on('change', '.discount',function(){
        saleCalculation();
    });

    //total vat percentage
    $(document).on('change', '#total_vat',function(){
        saleCalculation();
    });

    // payment method change
    $(document).on('change','#payment_method',function(){
        saleCalculation();
    });

    



</script>
@endpush

@endsection
