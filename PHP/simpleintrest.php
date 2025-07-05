<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="submit/input.php" method="post">
        <table>
            <tr>
                <td>Enter Price: </td>
                <td><input type="number" name="price"></td>
            </tr>
            <tr>
                <td>Enter Rate: </td>
                <td><input type="number" name="rate"></td>
            </tr>
            <tr>
                <td>Enter Year: </td>
                <td><input type="number" name="year"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="submit" name="submit">
                    <input type="reset" value="clear all">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>