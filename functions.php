<?php

//loome AB �henduse
   require_once("../config_global.php");
   $database = "if15_merit26_1";
 
  function getAllData(){
				   
				 $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);  
			   
			   $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates WHERE deleted IS NULL");
    		   $stmt -> bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
			   $stmt->execute();
				// massiiv, kus hoiame autosid
				$array = array();
				
				
				
				while($stmt->fetch()){
					//saime andmed k�tte
					//andmed saada transporditavale kujule
					
					// suvaline muutuja, kus hoiame auto andmeid massiivi lisamiseni
					$car = new StdClass();
				    $car-> id = $id_from_db;
				    $car-> color = $color_from_db;
				    $car-> user_id = $user_id_from_db;
					$car-> number_plate = $number_plate_from_db;
					//lisan massiivi
					array_push($array, $car);
					//echo "<pre>";
					//var_dump($array);
					//echo "</pre>";
				}
				return $array;	
				   
					
	       $stmt->close(); 
		   $mysqli->close();      
		   } 
  function deleteCarData($car_id){
		     $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);  		
             $stmt = $mysqli->prepare("UPDATE car_plates SET deleted=NOW() WHERE id=?");
			 $stmt -> bind_param("i", $car_id);
			 $stmt->execute();
			 // t�hjendame aadressirea
			 header("location:table.php");
             $stmt->close(); 
		     $mysqli->close();   
   
     }   
?>