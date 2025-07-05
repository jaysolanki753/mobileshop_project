<?php
    $mark=35;

    if($mark>90)
    {
        echo "Grade A";
    }
    else if($mark>75 && $mark<89)
    {
        echo "Grade B";
    }
    else if($mark>50 && $mark<74)
    {
        echo "Grade C";
    }
    else
    {
        echo "Fail.";
    }
?>