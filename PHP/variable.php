<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $date=date("d-m-y");
        echo $date;
        $color="lightblue";

        ?>
    </title>
</head>
<body bgcolor="<?php echo $color;?>">
    <?php
    $name="junior software developer.";
    $year="2025";
    echo $name;
    echo "<br>year is: " .$year;

?>
    
</body>
</html>