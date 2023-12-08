<?php
include 'config/config.php';
?>
<?php 
class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct(){
        $this->connectDB();
    }


public function connectDB(){
    $this->link = new mysqli($this->host , $this->user, $this->pass , $this->dbname);
    if($this->link){
        $this->error = "Connection fall".$this->link->connect_error;
        return false;
    }

}
// Select orr read data show and connect csdl
public function select($query){
    $result = $this->link->query($query) or
     die($this->link->error.__LINE__);
    if($result != false && $result->num_rows > 0){
        return $result;
    }else{
        return false;
    }
}

// insert data
public function insert($query){
    $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($insert_row){
        return $insert_row;
    }else{
        return false;
    }
}
// update data
public function update($query){
    $updata_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($updata_row){
        return $updata_row;
    }else{
        return false;
    }
}
// delete data
public function delete($query){
    $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($delete_row){
        return $delete_row;
    }else{
        return false;
    }
}
public function count($query){
    $count = $this->link->query($query) or die($this->link->error.__LINE__);
    if($count){
        return $count;
    }else{
        return false;
    }
}
}

?>