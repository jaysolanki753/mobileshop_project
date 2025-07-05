<?php
    require_once "connection.php";
    if(isset($_POST['add']))
    {
        $info=$db->prepare("INSERT INTO data(name,email,gender)VALUES(?,?,?)");
        $info->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['gender']
        ]);
        echo "<script>alert('Your data is inserted...');
            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
            </script>";
        exit();
    }

    $user=$db->query("SELECT * FROM data ORDER BY id ASC")->fetchAll();

    if(isset($_GET['delete']))
    {
        $info=$db->prepare("DELETE FROM data WHERE id=?");
        $info->execute([$_GET['delete']]);
        echo "deleted.";
        header("location:".$_SERVER['PHP_SELF']);
        exit();
    }

    $userEdit=null;
    if(isset($_GET['edit']))
    {
        $info=$db->prepare("SELECT * FROM data WHERE id=?");
        $info->execute([$_GET['edit']]);
        $userEdit=$info->fetch();
    }
    if(isset($_POST['update']))
    {
        $info=$db->prepare("UPDATE data SET name=?,email=?,gender=? WHERE id=?");
        $info->execute([
            $_POST['name'],
            $_POST['email'],
            $_POST['gender'],
            $_POST['id']
        ]);
          echo "<script>alert('Your data is updated...');
            window.location.href = '" . $_SERVER['PHP_SELF'] . "';
            </script>";
        exit();
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center"><?=$userEdit ? 'Update user':'Add user'?></h1>
    <form action="" method="post">
        <table border="1" align="center">
            <input type="hidden" name="id" value="<?=htmlspecialchars($userEdit['id'] ?? '')?>">
            
            <tr>
                <td>Enter Name: </td>
                <td><input type="text" name="name" value=<?=htmlspecialchars($userEdit['name']??'')?>></td>
            </tr>
            <tr>
                <td>Enter Email: </td>
                <td><input type="email" name="email" value=<?=htmlspecialchars($userEdit['email']??'')?>></td>
            </tr>
            <tr>
                <td>Enter Gender: </td>
                <td><input type="text" name="gender" value=<?=htmlspecialchars($userEdit['gender']??'')?>></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="<?=$userEdit ? 'Update':'Insert'?>" name="<?=$userEdit ? 'update':'add' ?>">
                    <input type="reset" value="reset">
                </td>
            </tr>
        </table>
    </form>

    <table border="1" align="center">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>gender</td>
            <td>opration</td>
        </tr>

    <?php foreach($user as $u): ?>
        <tr>
            <td><?=htmlspecialchars($u['id']); ?></td>
            <td><?=htmlspecialchars($u['name']); ?></td>
            <td><?=htmlspecialchars($u['email']); ?></td>
            <td><?=htmlspecialchars($u['gender']); ?></td>

            <td>
                <a href="?delete=<?=$u['id']?>" onclick="return confirm('confirm???');" name="delete">Delete</a>
                <a href="?edit=<?=$u['id']?>">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>