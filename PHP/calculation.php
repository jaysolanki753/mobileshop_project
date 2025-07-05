<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Submit/calculate.php" method="post">
    <table>
        <tr>
            <td>Enter 1st value: </td>
            <td><input type="number" name="value1"></td>
        </tr>
        <tr>
            <td>Enter 2nd value: </td>
            <td><input type="number" name="value2"></td>
        </tr>
        <tr>
            <td>Select any option: </td>
            <td><button type="submit" name="add">Addition</button>
            <button type="submit" name="subs">Subtraction</button>
            <button type="submit" name="multi">Multiplication</button>
            <button type="submit" name="div">Division</button></td>            
        </tr>
    </table>
</form>
</body>
</html>