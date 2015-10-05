<?php
require_once("functions.php");

   // kuulan, kas kasutaja tahab kustutada
   if(isset($_GET["delete"])) {
	   deleteCarData($_GET["delete"]);
   }
   
   if isset ($_GET["update"])) {
   updateCarData($_GET["car_id"], $_GET["number_plate"],$_GET["color"])};
  $car_array = getAllData();

?> 

<h1>Tabel</h1> 
<table>
<tr>
    <th>id</th>
	<th>kasutaja ID</th>
	<th>Number</th>
	<th>Värv</th>
	<th>Kustuta</th>
	<th>Edit</th>
</tr>  
 <?php
 
      //autod ükshaaval läbi käia
    for($i = 0; $i < count($car_array); $i++){
		
		//kasutaja tahab rida muuta
	if(isset($_GET["edit"])&& $_GET["edit"]==$car_array[$i]->id){
		echo "<tr>";
		echo "<form action='table.php' method='get'>";
		echo input type='hidden' name 
		echo "<td>".$car_array[$i]->id."</td>";  
        echo "<td>".$car_array[$i]->user_id."</td>";  
	    echo "<td><input name='number_plate' value='".$car_array[$i]->number_plate."'</td>";  
		echo "<td><input name='color' value='".$car_array[$i]->color."'</td>"; 
		echo "<td><input name='update' type='submit'></td>";  
		echo "<td><a href='?table.php'>cancel</a></td>";  ///siia jäi mingi jama sisse
	    
		echo"</tr>";
	
		}else{
    echo "<td>".$car_array[$i]->id."</td>";  
    echo "<td>".$car_array[$i]->user_id."</td>";  
	echo "<td>".$car_array[$i]->number_plate."</td>";  
	echo "<td>".$car_array[$i]->color."</td>"; 
	echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";  
	echo "<td><a href='?edit=".$car_array[$i]->id."'>E</a></td>";  
    echo "</tr>"; 
	}
   }
	
  
?> 
</table>