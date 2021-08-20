<?php
session_start();

//Check if field is empty or not
function checkName($name){
    if (empty($name)) {
        echo "Please enter name";
        return false;
    }
    return true;
}

//Relocate user to next page
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $check = checkName($name);
    if($check == TRUE){
        $_SESSION['name'] = $_POST['name'];
        header('Location: Food.php');
    }
}

//if(isset($_POST['submit'])) {
//    $check = checkName($_POST['name']);
//    if ($check == TRUE) {
//        $_SESSION['name'] = $_POST['name'];
//        $name = $_POST['name'];
//        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=hobbysurvey', 'root', '');
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//        $statementAdd = $pdo->prepare('INSERT INTO user (name, food, pet) VALUES (:name );');
//        $statementAdd->bindValue(':name', $name);
//        $statementAdd->execute();
//        try {
//            $statementAdd->execute();
//            header('Location: HobbySurvey/2-Food.php');
//        } catch (PDOException $e) {
//            header('Location: HobbySurvey/2-Food.php');
//        }
//    }
//}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Survey.css">
    <title>Products CRUD</title>
</head>
<body>
<div id="introduction">
    <h1>Login</h1>
</div>

<form method="post" action="index.php" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit">
</form>

</body>
</html>
