<!--   In Class-10 – ex 12.5 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Lab 12a</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">    
    <link rel="stylesheet" href="css/lab12a-ex06.css">
</head>
<body>
<main class="container">
    <article class="box">
      <div class="pagination">
           <!-- ex12.6 step 2-->
           <?php 
        for($i =1; $i<=6; $i++){
          echo "<a href='#'>$i</a>";
        }
        ?>

        <!-- ex12.6 step 3-->
        <?php 
        $start = 10;
        $end = 21;
        for($i = $start; $i<=$end; $i++){
          echo "<a href='#'>$i</a>";
        }
        ?>
     
         <!-- ex12.6 step 4-->
         <?php 
        $start = 10;
        $end = 21;
        $active = 18;
        for($i = $start; $i<=$end; $i++){
          echo "<a href='#' ";
          if ($i ==$active) echo "class='active";
          echo ">$i</a>";
        }
        ?>
        <a href="#" class="active">18</a>

        <!--
        <a href="#">1</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
-->
      </div>
    </article>      
</main>    
</body>
</html>