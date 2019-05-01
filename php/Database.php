<?php 
class DatabaseHandler {
    private $conn;
    private $error_msg = "No Error";
    private $isConnected = false;
    // Hold the singleton class instance.
    private static $instance = null;

    private $host = 'localhost';          // Server name or IP
    private $user = 'root';          // Connection username
    private $pass = '';          // Connection password
    private $name = 'company_4';          // Database name to connect to it

    private function __construct()
    {
      // The expensive process (e.g.,db connection) goes here.
    }

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
            $this->error_msg = $this->conn->connect_error;
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
            $this->error_msg = $this->conn->connect_error;
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