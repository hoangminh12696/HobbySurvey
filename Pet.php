<?php
    session_start();
    $pet = '';
    $dog = 'black';
    $cat = 'black';
    $hams= 'black';
    $name = $_SESSION['name'];
    $food = $_SESSION['food'];

    //Initiate database connection
    //$pdo = new PDO('mysql:host=localhost;port=3306;dbname=hobbysurvey', 'root', '');
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Get Heroku ClearDB connection information
/*$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;*/
    // Connect to DB
    $pdo = new PDO('mysql:host=remotemysql.com;port=3306;dbname=s8AWHZjN4w', 's8AWHZjN4w', 'InRSUPpTPt');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Check user selection
    if (isset($_POST['btnDog'])) {
        $pet = 'dog';
        $_SESSION['pet'] = $pet;
        //Check if name exist or not
        $check = $pdo->prepare("SELECT COUNT(*) FROM user WHERE name = :name");
        $check->bindValue(':name', $name);
        $check->execute();
        $rows = $check->fetchColumn();
        //Insert new user to database if not exist
        if($rows==0) {
            $statement = $pdo->prepare("INSERT INTO user (name, food, pet) VALUES (?, ?, ?)");
            $statement->execute([$name, $food, $pet]);
        //Update user data if exist
        } else {
            $statement = $pdo->prepare("UPDATE user SET food=?, pet=? WHERE name=?");
            $statement->execute([$food, $pet, $name]);
        }
        header('Location: Result.php');
    }elseif (isset($_POST['btnCat'])) {
        $pet = 'cat';
        $_SESSION['pet'] = $pet;
        $check = $pdo->prepare("SELECT COUNT(*) FROM user WHERE name = :name");
        $check->bindValue(':name', $name);
        $check->execute();
        $rows = $check->fetchColumn();
        if($rows==0) {
            $statement = $pdo->prepare("INSERT INTO user (name, food, pet) VALUES (?, ?, ?)");
            $statement->execute([$name, $food, $pet]);
        } else {
            $statement = $pdo->prepare("UPDATE user SET food=?, pet=? WHERE name=?");
            $statement->execute([$food, $pet, $name]);
        }
        header('Location: Result.php');
    }elseif (isset($_POST['btnHams'])) {
        $pet = 'hamster';
        $_SESSION['pet'] = $pet;
        $check = $pdo->prepare("SELECT COUNT(*) FROM user WHERE name = :name");
        $check->bindValue(':name', $name);
        $check->execute();
        $rows = $check->fetchColumn();
        if($rows==0) {
            $statement = $pdo->prepare("INSERT INTO user (name, food, pet) VALUES (?, ?, ?)");
            $statement->execute([$name, $food, $pet]);
        } else {
            $statement = $pdo->prepare("UPDATE user SET food=?, pet=? WHERE name=?");
            $statement->execute([$food, $pet, $name]);
        }
        header('Location: Result.php');
    }elseif (isset($_POST['btnBack'])) {
        header('Location: Food.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hobby Survey</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Survey.css">
</head>
<body>
<div id="introduction">
    <h2>Choose your favourite pet</h2>
</div>
<div id="userwc">
    <h4>Welcome <?php echo $name ?>!</h4>
</div>

<div id="grid-layout-33">
    //Item 1
    <div class="card" style="width: 18rem; border-color: <?php echo $dog ?>">
        <img class="card-img-top" src="images/dog.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Dog</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <form method="post" action="Pet.php">
                <input type="submit" class="btn btn-primary" id="btnDog" name="btnDog" value="Select">
            </form>
        </div>
    </div>

    //Item 2
    <div class="card" style="width: 18rem; border-color: <?php echo $cat ?>">
        <img class="card-img-top" src="images/cat.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Cat</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <form method="post" action="Pet.php">
                <input type="submit" class="btn btn-primary" id="btnCat" name="btnCat" value="Select">
            </form>
        </div>
    </div>

    //Item 3
    <div class="card" style="width: 18rem; border-color: <?php echo $hams ?>">
        <img class="card-img-top" src="images/hamster.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Hamster</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
            <form method="post" action="Pet.php">
                <input type="submit" class="btn btn-primary" id="btnHams" name="btnHams" value="Select">
            </form>
        </div>
    </div>
</div>
    //Return button
<div id="wrapper">
    <form method="post" action="Pet.php">
        <input type="submit" class="btn btn-primary" id="btnBack" name="btnBack" value="Back">
    </form>
</div>


</body>
</html>
