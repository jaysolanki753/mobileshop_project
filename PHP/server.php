<?php
    foreach($_SERVER as $key=>$values)
    {
        echo "server: $key as $values<br>";
    }

    echo "<br>server name: ".$_SERVER['SERVER_NAME']."<br>";
    if($_SERVER['SERVER_NAME']=='local')
    {
        echo "this is localhost.";
    }
    else
    {
        echo "this is not localhost but it is server.<br>";
    }
?>
