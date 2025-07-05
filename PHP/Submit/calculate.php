<?php
    if(isset($_POST['add'])==true)
    {
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
        $result=$value1+$value2;
        echo "addition is: ",$result;
    }
    else if(isset($_POST['subs'])==true)
    {
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
        $result=$value1-$value2;
        echo "substraction is: ",$result;
    }
    else if(isset($_POST['multi'])==true)
    {
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
        $result=$value1*$value2;
        echo "multiplication is: ",$result;
    }
    else if(isset($_POST['div'])==true)
    {
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
        $result=$value1/$value2;
        echo "division is: ",$result;
    }
?>