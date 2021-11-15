<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Election Data</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body class="container">
  <div class="table-responsive">
    <table class="table table-bordered table-hover" id="voterDetails">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Voter ID</th>
          <th scope="col">Voter Name</th>
          <th scope="col">Father/Husband Name</th>
          <th scope="col">House No</th>
          <th scope="col">Age</th>
          <th scope="col">Sex</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
  <script type="text/javascript">
  $.ajax({
    url: 'php/process.php',
    dataType: 'json'
  }).done(function(vData) {
    for (var i = 0; i < vData['voterId'].length; i++) {
      $('#voterDetails tbody').append('<tr>'+
      '<td>'+(i+1)+'</td>'+
      '<td>'+$.trim(vData["voterId"][i])+'</td>'+
      '<td>'+$.trim(vData["voterName"][i])+'</td>'+
      '<td>'+$.trim(vData["fatherName"][i])+'</td>'+
      '<td>'+$.trim(vData["houseNo"][i])+'</td>'+
      '<td>'+$.trim(vData["age"][i])+'</td>'+
      '<td>'+$.trim(vData["sex"][i])+'</td>'+
      '</tr>'
    );
  }
});
</script>
</body>
</html>
