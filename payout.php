<?php
require (__DIR__.'/inc/db.php');


if (isset($_POST['Amount'])) {
	$payout = mysqli_real_escape_string($db, $_POST['Amount'] / 27);
    $sql = "INSERT INTO payouts (amount) VALUES ('$payout')";
     if ($result = mysqli_query($db, $sql)) {
     	echo 'Updated</br></br>';
     	echo '<a href="admin.php">Back</a>';
}
}
else {
	exit;
}


?>