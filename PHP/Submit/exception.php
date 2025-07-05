<?php
    if(isset($_POST['submit']))
    {
        $value1=$_POST['value1'];
        $value2=$_POST['value2'];
    try
    {
    if($value2==0)
    {
        throw new Exception("Value2 is 0, Not devisible.");
    }
    echo "Value2 is not 0, its devisible.";
    $result=$value1/$value2;
    echo "<br>Ans: ",$result;
}
catch(Exception $e)
{
    echo "Error! ".$e->getMessage();
}
finally{
    echo "<br><br>Task is completed.";
}
}

?>