<?php
    session_start();
    $name = $_SESSION['name'];
    $food = $_SESSION['food'];
    $pet = $_SESSION['pet'];
    $cell11 = 'white';
    $cell12 = 'white';
    $cell13 = 'white';
    $cell21 = 'white';
    $cell22 = 'white';
    $cell23 = 'white';
    $cell31 = 'white';
    $cell32 = 'white';
    $cell33 = 'white';
    //Check user selection
    if($food=='chocolate'){
        if($pet=='dog'){
            $cell11='gray';
        }elseif ($pet=='cat') {
            $cell21='gray';
        }elseif ($pet=='hamster') {
            $cell31='gray';
        }
    }elseif ($food=='banana') {
        if($pet=='dog'){
            $cell12='gray';
        }elseif ($pet=='cat') {
            $cell22='gray';
        }elseif ($pet=='hamster') {
            $cell32='gray';
        }
    }elseif ($food=='chicken'){
        if($pet=='dog'){
            $cell13='gray';
        }elseif ($pet=='cat') {
            $cell23='gray';
        }elseif ($pet=='hamster') {
            $cell33='gray';
        }
    }
    //Initiate database connection
  //  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=hobbysurvey', 'root', '');
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
    //Count rows with query
    $statement = $pdo->prepare("SELECT COUNT(*) FROM user WHERE food=? and pet=?");

    //Return to Login and terminate session
    if(isset($_POST['finish'])) {
        session_destroy();
        header('Location: index.php');
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
    <h2>See result</h2>
</div>
<div id="userwc">
    <h4>Welcome <?php echo $name ?>!</h4>
</div>
<table class="center">
    <tr>
        <th></th>
        <th>Chocolate</th>
        <th>Banana</th>
        <th>Fried Chicken</th>
    </tr>
    <tr>
        <td>Dog</td>
        //Highlight table cell and display count result
        <td id="11" style="background: <?php echo $cell11 ?>"><?php $statement->execute(['chocolate', 'dog']);
        echo $statement->fetchColumn();?></td>
        <td id="12" style="background: <?php echo $cell12 ?>"><?php $statement->execute(['banana', 'dog']);
            echo $statement->fetchColumn();?></td>
        <td id="13" style="background: <?php echo $cell13 ?>"><?php $statement->execute(['chicken', 'dog']);
            echo $statement->fetchColumn();?></td>
    </tr>
    <tr>
        <td>Cat</td>
        <td id="21" style="background: <?php echo $cell21 ?>"><?php $statement->execute(['chocolate', 'cat']);
            echo $statement->fetchColumn();?></td>
        <td id="22" style="background: <?php echo $cell22 ?>"><?php $statement->execute(['banana', 'cat']);
            echo $statement->fetchColumn();?></td>
        <td id="23" style="background: <?php echo $cell23 ?>"><?php $statement->execute(['chicken', 'cat']);
            echo $statement->fetchColumn();?></td>
    </tr>
    <tr>
        <td>Hamster</td>
        <td id="31" style="background: <?php echo $cell31 ?>"><?php $statement->execute(['chocolate', 'hamster']);
            echo $statement->fetchColumn();?></td>
        <td id="32" style="background: <?php echo $cell32 ?>"><?php $statement->execute(['banana', 'hamster']);
            echo $statement->fetchColumn();?></td>
        <td id="33" style="background: <?php echo $cell33 ?>"><?php $statement->execute(['chicken', 'hamster']);
            echo $statement->fetchColumn();?></td>
    </tr>
</table>
<div id="wrapper">
    <form method="post">
        <input type="submit" class="btn btn-primary" id="finish" name="finish" value="Finish">
    </form>
</div>

</body>
</html>
