<<<<<<< HEAD
=======
<?php

require_once ('/opt/lampp/htdocs/tweetbook/controllers/UserController.php');
$s = UserController::suggestFollowers(1);
$searccc = UserController::search(1,"reem");
for($i = 0; $i < sizeof($s);$i++) {
    echo $s[$i];
    echo "<br>";
}
?>
>>>>>>> 9b39c8ccc40a8ac466f47fa622fb2db3f175da43
