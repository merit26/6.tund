<?php

//loome AB ühenduse
   require_once("../config_global.php");
   $database = "if15_merit26_1";
  //paneme tööle sessiooni
   session_start();

			   function getAllData(){
				   
				 $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);  
			   
			   $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
    		   $stmt -> bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
			   $stmt->execute();
				
				
				echo "</table border=1>";
				echo"<tr><th>rea nr</th><th>auto nr märk</th></tr>"
				
				while($stmt->fetch()){
					
					echo "<tr><td>$row_nr</td><td>$number_plate_from_db</td></tr>";
					
					($row_nr."".$number_plate_from_db." <br>");
					$row_nr++;
					
					///  siit jätkame järgmisel korral.
					
			   }
			   
			   echo"</table>";
	       $stmt->close(); 
		   $mysqli->close();      
		   } 

				
?>            

   