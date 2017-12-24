<?php

require_once ('/opt/lampp/htdocs/tweetbook/controllers/UserController.php');
$s = UserController::suggestFollowers(1);
$searccc = UserController::search(1,"reem");
for($i = 0; $i < sizeof($s);$i++) {
    echo $s[$i];
    echo "<br>";
}
?>