<?php

require (__DIR__.'/inc/db.php');

$sql = "SELECT hold FROM onhold WHERE id=(SELECT MAX(id) FROM onhold)";

 if ($result = mysqli_query($db, $sql)) {

           while ($row = mysqli_fetch_assoc($result)) {
           	$hold = $row['hold'];

           }
        }

?>

<HTML>

<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->




</head>

<body>

<h2>FoS Admin Area</h2>
</br>

<form class="form-horizontal" id="payoutform" action="payout.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Add payout</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Amount">Amount</label>  
  <div class="col-md-4">
  <input id="Amount" name="Amount" type="text" placeholder="payout amount" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit">Submit</label>
  <div class="col-md-4">

    <button id="Submit" type="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
</form>


<form id="holdform" class="form-horizontal" action="edit.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>Edit On Hold Amount</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hold">On-Hold</label>  
  <div class="col-md-4">

  <input id="hold" name="hold" type="text" value="<?php echo $hold?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">

    <button id="Submit2" type="submit" class="btn btn-primary">Edit</button>
  </div>
</div>
</fieldset>
</form>



    

</body>

</html>

