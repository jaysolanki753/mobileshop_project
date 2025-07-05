<?php
    $course=array(
        array("name"=>"PHP","duration"=>90,"fees"=>10000),
        array("name"=>"JavaScript","duration"=>90,"fees"=>5000),
        array("name"=>"HTML","duration"=>90,"fees"=>3000),
        array("name"=>"CSS","duration"=>90,"fees"=>2000)

    );
    print_r($course);
    echo "<br>";
    $size=sizeof($course);
    echo $size;
?>