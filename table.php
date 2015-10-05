<?php
require_once("functions.php");

   // kuulan, kas kasutaja tahab kustutada
   if(isset($_GET["delete"])) {
	   deleteCarData($_GET["delete"]);
   }
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
</tr>  
 <?php
 
      //autod ükshaaval läbi käia
    for($i = 0; $i < count($car_array); $i++){
    echo "<td>".$car_array[$i]->id."</td>";  
    echo "<td>".$car_array[$i]->user_id."</td>";  
	echo "<td>".$car_array[$i]->number_plate."</td>";  
	echo "<td>".$car_array[$i]->color."</td>"; 
	echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";  
    echo "</tr>"; 
	
   }
	
  
?> 
</table>