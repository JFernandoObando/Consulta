<?php

$DBhost = "localhost";
 $DBuser = "jobando";
 $DBpass = "Ligadequito1";
 $DBname = "CONSULTA";
 
try{
  
    $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
    $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM consulta_t";
 
    $stmt = $DBcon->prepare($query);
    $stmt->execute();

    $userData = array();

    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
      $userData['Usuarios'][] = $row;
 
    }   
    echo json_encode($userData);





   }catch(PDOException $ex){
    
    die($ex->getMessage());
   }