<?php
    echo "fprintf<br>";

    $file='jay.txt';
    $file_handle=fopen($file,'a');
    $contant="Hello, My Name is Jay Solanki.";
    fprintf($file_handle,$contant);
    fclose($file_handle);   
?>