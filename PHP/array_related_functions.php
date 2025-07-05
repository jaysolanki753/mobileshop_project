<?php
    echo "sort()<br>";

    $num=array(20,10,30,40,70);
    sort($num);
    print_r($num);

    echo "<br><br>asort()<br>";

    $person=array("vijay"=>30,"ajay"=>20,"jay"=>25);
    asort($person);
    print_r($person);
    
    echo "<br><br>count()<br>";

    echo count($person);

    echo "<br><br>extract()<br>";

    $person2=array("name"=>"jay","age"=>25,"weight"=>60);
    extract($person2);
    echo "$name $age $weight";

    echo "<br><br>list()<br>";

    $car=array("BMW","Black","Petrol");
    list($name,$color,$type)=$car;
    echo "car name is $name, color is $color and it's type is $type.";

    echo "<br><br>array_merge()<br>";

    $array1=array(10,20,30,40,50);
    $array2=array(60,70,80,90,100);
    $merge=array_merge($array1,$array2);
    print_r($merge);

    echo "<br><br>array_push()<br>";

    $job=array("Marketing","Accounting","Finance");
    array_push($job,"Banking");
    print_r($job);

    echo "<br><br>array_pop()<br>";

    array_pop($job);
    print_r($job);

    echo "<br><br>array_reverse()<br>";

    $input=array("PHP",4.0,array("red","green"));
    $rev=array_reverse($input);
    print_r($rev);

    echo "<br><br>array_sum()<br>";

    echo "sum is: ",array_sum($array1);

    echo "<br><br>implode()<br>";

    $fruites=array("Apple","Mango","Banana");
    $implode=implode(",",$fruites);
    echo "$implode";

    echo "<br><br>explode()<br>";

    $pizza="peice1 peice2 peice3";
    $peices=explode(" ",$pizza);
    print_r($peices);

    echo "<br><br>array_change_key_case()<br>";

    $name=array("dIpaK"=>1,"aMit"=>2,"jAy"=>3);
    print_r(array_change_key_case($name,CASE_UPPER));

    echo "<br><br>array_key_exists()<br>";

    if(array_key_exists("jAy",$name));
    {
        echo "This name is Exists.";
    }

    echo "<br><br>array_unshift()<br>";

    array_unshift($job,"Software","Hardware");
    print_r($job);
?>

