<?php

//loome AB �henduse
   require_once("../config_global.php");
   $database = "if15_merit26_1";
  //paneme t��le sessiooni
   session_start();
function logInUser($email, $hash){
           // GLOBALS saab k�tte k�ik muutujad
		   
		   $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		   
		   $stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
			
			//k�sim�rkide asendus s s on string string
			$stmt->bind_param("ss", $email, $hash);
			//ab tulnud muutujad
                $stmt->bind_result($id_from_db, $email_from_db);
                $stmt->execute();
                
                // teeb p�ringu ja kui on t�ene (st et ab oli see v��rtus)
                if($stmt->fetch()){
                    
                    // Kasutaja email ja parool �iged
                    echo "Kasutaja logis sisse id=".$id_from_db;
					 // sessioon, salvestatakse serveris
                  $_SESSION['logged_in_user_id'] = $id_from_db;
				  $_SESSION['logged_in_user_email'] = $email_from_db;
					// suuname kasutaja teisele lehele
					header("Location: data.php");  
					
                }else{
                    echo "Wrong credentials!";
			    }
				
			$stmt->close();
			$mysqli->close();
		}	

     function createUser($create_email, $hash){
                 $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
				 echo $mysqli->error;
	// salvestan andmebaasi
				$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES(?,?)");
				//kirjutan v�lja error
                //echo $stmt->error;
                echo $mysqli->error;
				
				// paneme muutujad k�sim�rkide asemele ss - string, iga muutuja kohta 1 t�ht
				$stmt->bind_param("ss", $create_email, $hash);
				
				// k�ivitab sisestuse
				$stmt->execute();
				$stmt->close();
				
				$mysqli->close();
   }
   function createCarPlate($car_plate, $color){
                 $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
				 // salvestan andmebaasi
				$stmt = $mysqli->prepare("INSERT INTO car_plates (user_id, number_plate, color) VALUES(?,?,?)");
				//kirjutan v�lja error
                //echo $stmt->error;
                //echo $mysqli->error;
				
				// paneme muutujad k�sim�rkide asemele ss - string, iga muutuja kohta 1 t�ht i-user_id int
				$stmt->bind_param("iss", $_SESSION['logged_in_user_id'], $car_plate, $color);
				
				// k�ivitab sisestuse
				if($stmt->execute()){
					
					
					//�nnestus
				   $message = "edukalt salvestatud!";
				}
				$stmt->close();
				$mysqli->close();
	                //saadan s�numi �nnestumise kohta
	               return $message; 
			   
			   }
			   
			   function getAllData(){
				   
				 $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);  
			   
			   $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
    		   $stmt -> bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
			   $stmt->execute();
				
				while($stmt->fetch()){
					echo($user_id_from_db);///  siit j�tkame j�rgmisel korral.
			   }
	       $stmt->close(); 
		   $mysqli->close();      
		   } 

				
?>            

   