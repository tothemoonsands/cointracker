<?php

require (__DIR__.'/inc/db.php');



if (isset($_POST['hold'])) {
	$hold = mysqli_real_escape_string($db, $_POST['hold']);
    $sql = "INSERT INTO onhold SET hold='$hold'";
     if ($result = mysqli_query($db, $sql)) {
     	echo 'Updated</br></br>';
     	echo '<a href="admin.php">Back</b>';
}
}
else {
	exit;
}


?>