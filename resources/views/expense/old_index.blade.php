@extends('layouts.admin')

@section('content')
<div class="container-fluid" style="padding: 2%;">
    <div class="row">
        <h3>Expense Module</h3>
    </div>
    <div class="row">
        <table class="table table-bordered table-hover table-striped" id="expense_table">
            <thead>
                <tr>
                    <th>SR. No.</th>
                    <th>Date</th>
                    <th>Salaries</th>
                    <th>Electricity</th>
                    <th>Cafe Material</th>
                    <th>Water Bills</th>
                    <th>Travel</th>
                    <th>Internet Charge</th>
                    <th>Additional Marketing</th>
                    <th>Events & Refreshments</th>
                    <th>Brokerage & Commision</th>
                    <th>Misc Expenses</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $key => $record)
                <tr id="{{$record->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$record->date}}</td>
                    <td>{{$record->salaries}}</td>
                    <td>{{$record->electricity}}</td>
                    <td>{{$record->cafe_total}}</td>
                    <td>{{$record->water_bills}}</td>
                    <td>{{$record->travel_hotel_conveyance_total}}</td>
                    <td>{{$record->internet_charge}}</td>
                    <td>{{$record->marketing_total}}</td>
                    <td>{{$record->event}}</td>
                    <td>{{$record->commission}}</td>
                    <td>{{$record->misc_total}}</td>
                    <td>
                        <!-- <a href="/expense/edit/{{$record->id}}" class="btn btn-success" style="border-radius: 25px;">
                            <i class="fa fa-edit"></i>
                        </a>
 -->
                        <a href="#" class="btn btn-success" style="border-radius: 25px;">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="{{ url('show_expense') }}/{{$record->id}}" class="btn btn-primary" style="border-radius: 25px;">
                            <i class="fa fa-eye"></i>
                        </a>

                        <a href="javascript:void(0)" id="{{$record->id}}" class="btn btn-danger expense_delete_button" style="border-radius: 25px;">
                            <i class="fa fa-trash"></i>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- ====Delete Visitor required modal begins========== -->

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
            </div>

          <div class="modal-body">
              
            <div class="thank-you-pop text-center">
              <img src="https://cdn.pixabay.com/photo/2015/06/09/16/12/confirmation-803715_960_720.png" width="100" alt="">
              <p>Are you sure you want to delete this Expense?</p>
            </div>                         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="" role="button" class="btn btn-danger expense_delete_btn" data-dismiss="modal">Delete</button>
      </div>

      </div>
  </div>
</div>

<!-- ====Delete Visitor required modal ends========== -->
<script type="text/javascript">
$(function() {
    $(".expense_delete_button").on("click", function() {
        expense_id = $(this)[0].id
        delete_expense_url = '/expense/delete/'+expense_id
        $("#myModal .expense_delete_button").attr("id", expense_id)
        $('#myModal').modal('show')
        $(".expense_delete_btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
            url: delete_expense_url,
            headers:{
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },   
            method: 'get',
            type: 'JSON',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
              $('#loading_icon').show();
            },
            success: function(obj) {
              console.log(obj)
              $(".alert-danger").remove();
              if(obj.status ="success") {
                swal(
                    'Success',
                    'An Expense deleted <b style="color:green;">successfully</b>!',
                    'success'
                  )
              }
              $("#expense_table tr#"+expense_id).fadeOut()
              window.location.href = "/expense/index";
            },
            error: function(obj) {
              if (obj.status == 401) {
                swal(
                  'Warning',
                  'You are not Authorized!',
                  'warning'
                );
              }

              
              console.log(obj)
              $(".alert-danger").remove();
              console.log(obj.responseJSON.errors)
              $.each(obj.responseJSON.errors, function(key, val) {
                $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>"+val+"</li></ul>")
              });
            },
            complete: function() {
              $('#loading_icon').hide();
            }
          })

        })


    })

})
</script>



@endsection


