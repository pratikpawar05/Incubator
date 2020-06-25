@extends('layouts.admin')

<style type="text/css">
  thead,
  th,
  td {
    /* text-align: center; */
  }
  .table-hover:hover {
    background-color: blue;
  }
  #datatable-buttons_previous,#datatable-buttons_next{
        text-transform: uppercase;
    }
</style>

@section('content')

<div class="container-fluid" style="padding-left: 3%;padding-right: 3%;">
      <div class="row" style="background-color: #305881; color: #fff; padding: 2%; border-radius: 10px;">
          <div class="col-sm-2">
            <div class="form-group">
              <label for="sel1">Expense Month:</label>
              <select name="month" class="form-control" id="month" placeholder="Select">
                  <option value="">--Select--</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="sel1">Expense Year</label>

                <select name="month" class="form-control" id="year">
                      <option value="">--Select--</option>
                      <!-- <option value="2010">2010</option>
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option> -->
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                  </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
                <button style="margin-top:25px;" id="filter" class="btn btn-success">Filter</button>
              </div>
          </div>
          <div class="col-sm-offset-4 col-sm-1">
            <a class="btn btn-info btn-lg" style="margin-top:25px;" href="{{ route('add_expense') }}" >Add Expense</a>

          </div>
        </div>
        <div class="row">
            <label style="color: red" id="date_error"></label>
        </div>
      </div>

    <div class="container-fluid" style="padding-left: 3%;padding-right: 3%;">
      <div class="row">
        <h3>Expense Module</h3>
      </div>

      <div class="row" style="overflow:auto;">
        <div style="overflow-x:auto;">
          <table style="font-size: 18px;" id="datatable-buttons" class="table bg-white table-bordered" cellspacing="0" width="100%">
            <thead style="background-color: #134C80;color: white;">

              <tr>
                <th class='fix'><b>SR. NO.</b></th>
                <th class='fix'><b>TYPE</b></th>
                <th class='fix'><b>BUDGETS</b></th>
                <?php
                foreach ($records as $record) {
                  echo "<th class='" . $record['id'] . "'>" . $record['date'] . "</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>

              <?php
              if (!empty($keys)) {
                $key = 0;
                $in = 1;
                $sr_no = 1;
                for ($index = 0; $index < count($types); $index++) {
                  if (($index == 4) || ($index == 6) || ($index == 10) || ($index == 12) || ($index == 17) || ($index == 19) || ($index == 24) || ($index == 31) || ($index == 39) || ($index == 29) || ($index == 43) || ($index == 44))
                    echo "<tr style='background-color: yellow; font-weight: bold;'>";
                  else
                    echo "<tr>";

                  if (($index == 0) || ($index == 5) || ($index == 7) || ($index == 11) || ($index == 13) || ($index == 18) || ($index == 20) || ($index == 25) || ($index == 30) || ($index == 32) || ($index == 40)) {
                      echo "<td class='fix'>" . $sr_no . "</td>";
                      $sr_no++;
                    }
                    else
                      echo "<td class='fix'></td>";
                  echo "<td class='fix' style='text-transform: uppercase;'>" . $types[$index] . "</td>";
                  if (($index == 4) || ($index == 6) || ($index == 10) || ($index == 12) || ($index == 17) || ($index == 19) || ($index == 24) || ($index == 31) || ($index == 39) || ($index == 29) || ($index == 43) || ($index == 44)) {
                    echo "<td class='fix money'>" . $budgets[$key] . "</td>";
                    $key++;
                  } else
                    echo "<td class='fix'></td>";


                  if (($index == 7) || ($index == 13) || ($index == 20) || ($index == 25) || ($index == 32) || ($index == 40) || ($index == 6) || ($index == 12) || ($index == 19) || ($index == 31)) {
                    $in++;
                  }

                  // if (($index == 6) || ($index == 12) || ($index == 19) || ($index == 31))
                    // $in++;
                  foreach ($records as $record) {

                    if (($index == 0) || ($index == 7) || ($index == 13) || ($index == 20) || ($index == 25) || ($index == 32) || ($index == 40)) {
                      echo "<td class='" . $record['id'] . "'></td>";
                      // ;
                    } else
                      // ;
                      echo "<td class='" . $record['id'] . " money'>" . $record[$keys[$index - $in]] . "</td>";
                  }


              ?>
                  </tr>
              <?php
                }  //outer loop
              }  // if
              ?>

            </tbody>
          </table>
        </div>
      </div>
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

        var col = $(this).parent().parent().children().index($(this).parent());
        expense_id = $(this)[0].id
        delete_expense_url = '/expense/delete/' + expense_id
        $("#myModal .expense_delete_button").attr("id", expense_id)
        $('#myModal').modal('show')
        $(".expense_delete_btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: delete_expense_url,
                headers: {
                  'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                method: 'get',
                type: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                  $('#loading_icon').show();
                },
                success: function(obj) {
                  console.log(obj)
                  $(".alert-danger").remove();
                  if (obj.status = "success") {
                    swal(
                      'Success',
                      'An Expense deleted <b style="color:green;">successfully</b>!',
                      'success'
                    )
                  }
                  // $("#expense_table tr#"+expense_id).fadeOut()
                  $("tr").each(function() {
                    $(this).children().filter("td:eq(" + (col + 3) + ")").remove();
                    $(this).children().filter("th:eq(" + (col + 3) + ")").remove();
                  });

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
                    $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>" + val + "</li></ul>")
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


<script>
  $("#filter").on("click", function(e) {
    e.preventDefault()

    var year = $('#year').val()
    var month = $('#month').val()
    if (year == "--Select--" || month == '') {
      $('#date_error').text("Year or Month can't be empty")
    } else {
      $.ajax({
        url: '/filter/' + year + "/" + month,
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        method: 'get',
        type: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#loading_icon').show();
        },
        success: function(obj) {
          // alert(obj.id)
          $(".alert-danger").remove();
          if (obj.status == "Expense already exists!") {
            swal(
              'Warning',
              'This Expense Report already exists!',
              'warning'
            )
          }

          $("th,td").not('.fix').hide();
          $("." + obj.id).show();

        },
        error: function(obj) {
          if (obj.status == 401) {
            swal(
              'Warning',
              'You are not Authorized!',
              'warning'
            );
          }

          
          alert("Expense Report for this month does not exists")
          $(".alert-danger").remove();
          console.log(obj.responseJSON.errors)
          $.each(obj.responseJSON.errors, function(key, val) {
            $('.errors').append("<ul style='list-style-type: none;'><li class='alert alert-danger'>" + val + "</li></ul>")
          });
        },
        complete: function() {
          $('#loading_icon').hide();
        }
      })
    }
  });
</script>


<script type="text/javascript">
  $( "tr:eq(1)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(6)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(8)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(12)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(14)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(19)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(21)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(26)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(31)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(33)" ).css( "background-color", "#01ff7075" );
  $( "tr:eq(41)" ).css( "background-color", "#01ff7075" );

$('.money').each(function() { 
                var monetary_value = $(this).text(); 
                var i = new Intl.NumberFormat("en-IN").format(monetary_value);
                $(this).text(i); 
            }); 

</script>


@endsection