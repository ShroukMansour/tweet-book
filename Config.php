<?php
class connection {
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "tweet_book";
    private $conn;

    function createConnection() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }
    function getFromDB($sql) {
        $this->createConnnection();
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = $this->conn->query($sql);
        $followers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($followers, $row["friend_id"]);
            }
        }
        $this->closeConnection();
        return $followers;
    }
    function closeConnection() {
        $this->conn->close();
    }
}

?>
