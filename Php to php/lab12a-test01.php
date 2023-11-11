<!--   Asg-10 – test 01 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj  -->
<html>
<head>
<title>Lab 12a</title>
<style>
   img { float:left; width: 200px; }
   div { margin-left: 205px; }
   h1 { margin: 0; font-size: 1.5em;}
   h2 { margin: 0; font-size: 1.25em;}
</style>
</head>
<body>


<img src="images/134020.jpg"  />
<?php  
   include("art_data.php"); 
   ?> 

   <h1><?php echo "{$title} ({$year}) <br>" ?></h1>
   <h2><?php echo "By {$artist}  <br><br>"?> </h2>
   <p>
  <?php  echo "{$dimensions}  <br>" ?>
   <?php echo " {$medium} <br>"; ?>
   <?php echo "{$era}  <br>";?>
   <br/>
   </p>


</body>
</html>
