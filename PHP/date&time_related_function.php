<?php
$bithdate=strtotime("24-03-2004");
$datenow=strtotime("now");
$diff=$datenow-$bithdate;
echo "difference of seconds: ".$diff;
echo "<br>";
echo "difference of minutes: ".floor(($diff/60));
echo "<br>";
echo "difference of hourse: ".floor(($diff/3600));
echo "<br>";
echo "difference of day: ".floor(($diff)/(60*60*24));
echo "<br>";
echo "difference of year: ".floor(($diff)/(60*60*24*365));
?>