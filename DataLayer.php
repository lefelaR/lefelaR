<?php
include_once 'components/config.php';
include_once 'components/Helpers.php';


class DataLayer extends Helpers
{
 
 public function __constructor()
 {
 }

 public static function get()
 {
    $qry = "SELECT * FROM contacts";
    $config = new Config();
    $db = $config->connection();
    $data = $db->query($qry);
    $result = self::handleResult($data);

    return $result;
   }


 public static function post( $data)
 {

   $name = $data["name"];
   $email = $data["email"];
   $message = $data["message"];
   $date = date("Y/m/d");
    $qry = "INSERT INTO `contacts` (`id`,`name`,`email`,`message`,`created_date`,`status`) VALUES 
            ('','$name','$email','$message' ,'$date ',1)";
    $config = new Config();
    $db = $config->connection();
    $db->query($qry);
 }

 public static function update($id, $data)
 {
   //  $qry = "SELECT * FROM contacts";
   //  $config = new Config();
   //  $db = $config->connection();
   //  $data = $db->query($qry);
   //  $result = self::handleResult($data);

   //  return $result;
   }


   public static function delete($id, $data)
   {
      // $qry = "SELECT * FROM contacts";
      // $config = new Config();
      // $db = $config->connection();
      // $data = $db->query($qry);
      // $result = self::handleResult($data);
  
      // return $result;
     }
}
