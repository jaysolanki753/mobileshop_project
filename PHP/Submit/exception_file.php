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
    $file="Errore.txt";
    $file_handle=fopen($file,"w");
    $result=$value1/$value2;
    $message="Value2 is not 0, its devisible---Ans is: ".$result;
    fprintf($file_handle,$message);
    fclose($file_handle);
}
catch(Exception $e)
{
    $file="Errore.txt";
    $file_handle=fopen($file,"w");
    $message="Error! ".$e->getMessage();
    fprintf($file_handle,$message);
    fclose($file_handle);
}
finally{
    echo "Task is completed.";
}
}

?>