<?php 
class LogHandler{
    private $log_file_path = "../log.txt";
    private $error_msg = "No Error";
    // Hold the singleton class instance.
    private static $instance = null;

    public static function getInstance()
    {
        if(!self::$instance){
            self::$instance = new LogHandler();
        }
        return self::$instance;
    }

    public function addLogMessage($log_message){
        try{
            $log_file = fopen($this->log_file_path, "a");
            $txt = date("Y-m-d h:i:sa") . " => " . $log_message . "</br>";
            fwrite($log_file, $txt);
            fclose($log_file);
        }catch(Exception $e){
            $this->error_msg = $e->getErrorMessage();
        }
    }

    public function readLogFile(){
        return readfile($this->log_file_path);
    }

    public function getErrorMessage(){
        return $this->error_msg;
    }
}
?>