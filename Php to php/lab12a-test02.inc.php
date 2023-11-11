
<!--   Asg-10 – test XX – COSC 2328 – Professor McCurry -->
<!-- Implemented by - Analee Maharaj  -->

<?php
        //function that converts US to Euor
        function UStoEuro($USdollar, $exchangerate){
            $euro = $USdollar * $exchangerate ;
            return round($euro);
        }

        //function that converts the euro dollar to us dollar
        function UStoUk($USdollar, $exchangerate){
            $USDollar = $USdollar * $exchangerate ;
            return round($USDollar);
        }
        
        function generateBox($name, $numberOfUsers) {
            $uscost = 0;
            $storage = 0;
            $email = 0;
            $euro=0;
        
            if ($name === 'Professional') {
                if ($numberOfUsers <= 10) {
                    $cost = $numberOfUsers * 1;
                } elseif ($numberOfUsers <= 50) {
                    $uscost = $numberOfUsers * 0.9;
                } else {
                    $uscost = $numberOfUsers * 0.8;
                }
        
                $storage = $numberOfUsers * 10;
                $email = $numberOfUsers * 5;
            } elseif ($name === 'Enterprise') {
                if ($numberOfUsers <= 10) {
                    $uscost = $numberOfUsers * 2;
                } elseif ($numberOfUsers <= 50) {
                    $uscost = $numberOfUsers * 1.8;
                } else {
                    $uscost = $numberOfUsers * 1.6;
                }
        
                $storage = $numberOfUsers * 10;
                $email = $numberOfUsers * 10;
            }
            elseif ($name === 'Starter') {
                $numberofusers = 1;
                $storage = $numberofusers * 5;
                $email = $numberofusers *2;
                $uscost = $numberofusers * 10;
                $euro = UStoEuro($uscost, 0.87);
            }
            elseif ($name === 'Developer') {
                $numberofusers = 3;
                $storage = $numberofusers * 5;
                $email = $numberofusers *2;
                
            }
        
            // Generate the HTML markup for the pricing box
            $markup = "<div class='pricing-box'>";
            $markup .= "<header>$name</header>";
            $markup .= "<p> <b> $numberOfUsers </b>users </p>";
            $markup .= "<p><b>$storage</b> GB storage </p>";
            $markup .= "<p> <b>$email</b> email accounts</p>";
            $markup .= "<footer>    </footer>";

            $markup .= "</div>";
        
            return $markup; // Return the HTML markup
        }
        

        

        
?>