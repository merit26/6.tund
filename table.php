Siia tuleb tabel
<?php
require_once("functions.php")
  $car_array = getAllData();

?> 

<h1>Tabel</h1> 
<?php

   //autod �kshaaval l�bi k�ia
   for($i = 0; $i < count($car_array); $i++){}
       echo $car_array[$i]->number_plate."<br>";
   
?> 