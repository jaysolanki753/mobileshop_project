<?php

try
{
    $age=18;
    if($age<18)
    {
        throw new Exception("Age is less than 18");
    }
    echo "Age is greater than 18";
}
catch(Exception $e)
{
    echo "Error! ".$e->getMessage();
    echo "<br>";
}
finally
{
    echo "<br><br>Task is completed.";
}

?>