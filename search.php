<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="custom.css" >

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>


<?php


$input = $_REQUEST['search'];

if (!$input) {
	echo 'Please enter valid firstbits';
  echo '</br><a href="index.php">Back</a>';
  exit;
}



$string = file_get_contents("coins.json");
$json_a = json_decode($string, true);


$coins = $json_a['founders'];



function find($coins, $input) {
  foreach($coins as $item) {
    $matches = preg_grep("/$input/", $item);
    if($matches) {
      return($item);
    }
  }
}

$found = (find($coins, $input));

if ($found) {

  echo '
  </br></br></br></br><div class="container"><div class="col-sm-6 col-sm-offset-3"><div class="panel-footer"><center>';
  echo 'Address: ' . $found['address'] . '</br>';
  echo 'Serial Number: ' . $found['serial'] . '</br>';
  echo 'Year: ' .$found['year'] . '</br>';
  echo 'Plating: ' . $found['plate'] . '</br>';
  echo 'Material: ' . $found['material'] . '</br>';
  echo 'Membership: ' . $found['membership'] . '</br>';

  $addressinfo = file_get_contents('https://blockchain.info/address/' . $found['address'] . '?format=json');
  $addressdecoded = json_decode($addressinfo, true);
  $bcbal = $addressdecoded['final_balance'] / 100000000;

  $txs = $addressdecoded['txs'];



  echo 'Balance: ' . $bcbal . '</br>';
  $USD = file_get_contents("https://blockchain.info/ticker");
  $price = json_decode($USD, true);
  $price1 = $price['USD']['last'];
  echo 'Total USD Value: ' . $bcbal * $price1 . '</br>';

  echo '</br><a href="index.php">Back</a></center>
  </div></div></div>
  ';
}
else {
	echo 'No coins found';
  echo '</br><a href="index.php">Back</a>';
}


?>


</body>
</html>