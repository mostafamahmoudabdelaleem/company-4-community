<?php 
class DatabaseHandler {
    private $conn;
    private $error_msg = "No Error";
    private $isConnected = false;
    // Hold the singleton class instance.
    private static $instance = null;

    private $host = 'host';          // Server name or IP
    private $user = 'user';          // Connection username
    private $pass = 'pass';          // Connection password
    private $name = 'name';          // Database name to connect to it

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new DatabaseHandler();
        }
        return self::$instance;
    }
    
    public function connect () {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        $this->isConnected = true;
        // Check connection
        if (!$this->conn->connect_error) {
            $this->err_msg = $this->conn->connect_error;
            $this->isConnected = false;
        }
    }
    public function disconnect () {
        mysqli_close($this->conn);
        $this->isConnected = false;
    }

    public function execute_query ($query) {
        $result = $this->conn->query($query);
        // Check query result
        if ($result) {
            return $result;
        } else {
            $this->err_msg = $this->conn->connect_error;
            return null;
        }
    }

    public function getErrorMessage(){
        return $this->error_msg;
    }

    public function getDBConnection(){
        return $this->conn;
    }

    public function isConnected(){
        return $this->isConnected;
    }
}
?>