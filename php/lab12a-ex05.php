<!--   In Class-10 – ex 12.6 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj -->
<html>
<head>
<title>Lab 12a</title>
<style>
   img { float:left; width: 200px; display: block; margin-right: 10px;}
   h2 { margin: 0; font-size: 1.25em;}
</style>
</head>
<body>

<?php
$thumbnail = "134020.jpg";
$title = "Portrait of Isabella of Portugal";
#ex 12.5a step 1#
$img = "<img src='images/$thumbnail' alt='$title' title='$title'/>";


#ex 12.5a step 3#
$year = 1800;
$era = "15th Century";

echo $year; 
if ($year < 1500) {
    $era = "Early times";
} elseif ($year >= 1500 && $year < 1600) {
    $era = "16th Century";
} elseif ($year >= 1600 && $year < 1700) {
    $era = "17th Century";
} elseif ($year >= 1700 && $year < 1800) {
    $era = "18th Century";
} else {
    $era = "Modern times";
}


?>

<!-- ex 12.5a step 2-->
<?php echo $img  ?>

<h2>
   <?php echo $era ?>
</h2>


</body>
</html>