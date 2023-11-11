<!--   Asg-10 – test 02 – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj  -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>  
    <title>Lab 12a</title>   
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">    
    <link rel="stylesheet" href="css/lab12a-test02.css">
   <?php  include 'lab12a-test02.inc.php'; // Include the function file
?>
</head>
<body>
<header><?php $name ?></header>

<main class="container">
    <div class="grid-container">
        <div class="box">
            <div>
                <?php $starterBox = generateBox('Starter', 1);
                echo $starterBox; ?>
            </div>
            <footer><?php $USdollar = 10;
            $euro = UStoEuro($USdollar, 0.87);
            $uk = UStoUk($USdollar, 0.76);
            echo "$$USdollar •  €{$euro} • £{$uk}";  ?> </footer>            
        </div>
        <div class="box">
            <div>
               
                <?php $developerBox = generateBox('Developer', 3);
                echo $developerBox; ?>
            </div>
            <footer><?php $USdollar = 30;
            $euro = UStoEuro($USdollar, 0.87);
            $$uk = UStoUk($USdollar, 0.76);
            echo "$$USdollar •  €{$euro} •  £{$uk}"; ?> </footer>            
        </div>
        <div class="box">
            <div>
              
                <?php $professionalBox = generateBox('Professional', 10);
                echo $professionalBox; ?>
            </div>
            <footer><?php $USdollar = 90;
            $euro = UStoEuro($USdollar, 0.87);
            $uk = UStoUk($USdollar, 0.76);
            echo "$$USdollar • €{$euro} • £{$uk}"; ; ?> </footer>            
        </div>
        <div class="box">
            <div>
               
                <?php $enterpriseBox = generateBox('Enterprise', 50);
                echo $enterpriseBox; ?>
            </div>
            <footer> 
        <?php 
            $USdollar = 400;
            $euro = UStoEuro($USdollar, 0.87);
            $uk = UStoUk($USdollar, 0.76);
            echo "$$USdollar •  €{$euro} •  £{$uk}"; 
        ?>
    </footer>
        
        </div>   





 
</main>   
</body>
</html>