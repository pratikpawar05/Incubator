<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>visit_date</th>
        <th>Channels_name</th>
        <th>Person_Name</th>
        <th>Mobile</th>
        <th>emails</th>
        <th>email_type</th>
        <th>Company_name</th>
        <th>Designation</th>
        <th>Website</th>
        <th>dealer_type</th>
        <th>Dealer_name</th>
        <th>Required_seats</th>
        <th>Stage_of_client</th>
        <th>needs_of_seats</th>
        <th>Deal_remarks</th>
      </tr>
    </thead>


  @if(isset($pdf_data))
          @foreach($pdf_data as $pdf)
    <tbody>
      <tr>
        <td>{{$pdf->id}}</td>
        <td>{{$pdf->visit_date}}</td>
        <td>{{$pdf->Channels_name}}</td>
        <td>{{$pdf->Person_Name}}</td>
        <td>{{$pdf->Mobile}}</td>
        <td>{{$pdf->emails}}</td>
        <td>{{$pdf->email_type}}</td>
        <td>{{$pdf->Company_name}}</td>
        <td>{{$pdf->Designation}}</td>
        <td>{{$pdf->dealer_type}}</td>
        <td>{{$pdf->Dealer_name}}</td>
        <td>{{$pdf->Required_seats}}</td>
        <td>{{$pdf->Stage_of_client}}</td>
        <td>{{$pdf->needs_of_seats}}</td>
        <td>{{$pdf->Deal_remarks}}</td>
      </tr>
    </tbody>

     @endforeach
        @endif
  </table>

</body>
</html>