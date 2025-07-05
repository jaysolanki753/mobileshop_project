<?php
    if(isset($_POST['submit']))
    {
        $weight=$_POST['weight'];
        $height=$_POST['height'];

        function bmi($weight,$height)
        {
            $bmi=$weight/($height*$height);
            return bmi;
        }
    }

    
?>