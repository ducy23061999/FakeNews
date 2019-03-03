<?php
require_once 'config.php';
class Info{
  private $conn;
  public $id;
  public $title;
  public $decrip;
  public $image;
  function Init_Connection(){
    
    try{
      $this->conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS); 
    }catch(Exception $e){
      echo "error: " + $e->getMessage() + '\n';
    }
    return $this->conn;
  }

  public static function Create(){
    try{
      $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS);  
      if ($conn){
        mysqli_select_db($conn,DB_NAME);
        $status = mysqli_query($conn,"CREATE TABLE IF NOT EXISTS Info(
            id varchar(15) PRIMARY KEY,
            title varchar(500),
            descrip varchar(1000),
            image varchar(300)
        )");
      }else{
        echo "ERROR";
      };
    }catch(Exception $e){
      echo "error: " + $e->getMessage() + '\n';
    }
    mysqli_close($conn);
  }
  public function Insert($id,$title,$desc,$image){
    try{
      $this->Init_Connection();
      mysqli_select_db($this->conn,DB_NAME);
      $status = mysqli_query($this->conn,
        "INSERT INTO Info VALUES ('$id','$title','$desc','$image')"
      );
      mysqli_close($this->conn);
      
      return $status;
    }catch(Exception $e){
      echo "error: " + $e->getMessage() + '\n';
    }
    
  }

  public function Get_Data($id){
    try{
      $this->Init_Connection();
      mysqli_select_db($this->conn,DB_NAME);
      $result = mysqli_query($this->conn,
        "SELECT * FROM Info WHERE id = '$id' LIMIT 1"
      );
     
      if ($result){
          $val = mysqli_fetch_assoc($result) ;
          $this->id = $val['id'];
          $this->title = $val['title'];
          $this->decrip = $val['descrip'];
          $this->image = $val['image'];
          mysqli_close($this->conn);
          return true;
      }else{
        mysqli_close($this->conn);
        return false;
      }
      
  
    }catch(Exception $e){
      echo "error: " + $e->getMessage() + '\n';
    }
  }



}


  