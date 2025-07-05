<?php
if(isset($_POST['submit'])==FALSE)
{
    echo "please submit properly.";
}
else if(empty ($_POST['price'])==true||empty ($_POST['rate'])==true||empty ($_POST['year'])==true)
{
    echo "fill all inputs in given form.";
}
else if(is_numeric($_POST['price'])==false||is_numeric($_POST['rate'])==false||is_numeric($_POST['year'])==false)
{
    echo "please enter only numbers.";
}
else
{
    $price=$_POST['price'];
    $rate=$_POST['rate'];
    $year=$_POST['year'];

    $result=($price*$rate*$year)/100;
    echo "simple intrest is: " .$result;
}
?>