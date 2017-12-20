<?php
$full_name=$_POST["fname"];
$username=$_POST["uname"];
$password=$_POST["psw"];

foreach($_POST as $key=>$value) {
	if(empty($_POST[$key]) || $_POST[$key]=="") {
	$error_message = "All Fields are required";
	break;
	}
}
$con=mysql_connect("localhost","root","");
mysql_select_db("tweet_book");
if (empty($_POST['fname']) || empty($_POST['uname']) || empty($_POST['psw'])) {
       echo "All fields are required";
    } else {
        $sql = 'SELECT * FROM user where email = "'.$_POST['uname'].'"';
        $res = mysql_query($sql);
        if($res && mysql_num_rows($res)>0){
          echo "User name is already taken";
           /*echo "<script type='text/javascript'>alert(<?php echo $error; ?>);</script>";*/

        }
        //check the input characters
        else if (!preg_match("/^[0-9_a-zA-Z]*$/", $username) || !preg_match("/^[0-9_a-zA-Z]*$/", $full_name) || !preg_match("/^[0-9_a-zA-Z]*$/", $password) ) {
            echo "Only letters, numbers and '_' allowed";
        }
        else{
            $query=mysql_query("insert into user (name,email,password) values  ('$full_name','$username','$password') ");
            if ($query)
            {
                echo"done";
                //header("Location: select_all.php");
            }
            else
            {
            echo "not inserted";
            }
        }
    }

mysql_close($con);

?>