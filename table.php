Siia tuleb tabel
<?php
require_once("functions.php")
  $car_array = getAllData();

?> 

<h1>Tabel</h1> 
<table>
<tr>
    <th>id</th>
	<th>Auto numbrimärk</th>
</tr>  
 <?php
 
      //autod ükshaaval läbi käia
    for($i = 0; $i < count($car_array); $i++){
    echo "<td>".$car_array[$i]->id."</td>";  
    echo "<td>".$car_array[$i]->number_plate."</td>";  
    echo "</tr>"; 
    }
	
  
?> 