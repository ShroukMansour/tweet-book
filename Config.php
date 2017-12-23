<?php
class connection {
    static function createConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tweet_book";
        $conn = mysqli_connect($servername,$username,$password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    static function closeConnection($conn) {
        $conn->close();
    }
}

?>
