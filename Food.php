<?php
    session_start();
    $food = $_SESSION['food'];
    $choco = 'black';
    $banana = 'black';
    $chicken = 'black';
    $name = $_SESSION['name'];

    //Check user selection
    if(isset($_POST['btnChoco'])) {
        $food = 'chocolate';
        $_SESSION['food'] = $food;
        header('Location: Pet.php');
    } elseif (isset($_POST['btnBanana'])) {
        $food = 'banana';
        $_SESSION['food'] = $food;
        header('Location: Pet.php');
    } elseif (isset($_POST['btnChick'])) {
        $food = 'chicken';
        $_SESSION['food'] = $food;
        header('Location: Pet.php');
    }

    //Check user selection to highlight item
    switch ($food){
        case 'chocolate':
            $choco = 'red';
            break;
        case 'banana':
            $banana = 'red';
            break;
        case 'chicken':
            $chicken = 'red';
            break;
        default:
            $choco = 'black';
            $banana = 'black';
            $chicken = 'black';
            break;
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
    <h2>Choose your favourite food</h2>
</div>
<div id="userwc">
    <h4>Welcome <?php echo $name ?>!</h4>
</div>


<div id="grid-layout-33">
    //Item 1
    <div class="card" style="width: 18rem; border-color: <?php echo $choco ?>">
        <img class="card-img-top" src="images/chocolate.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Chocolate</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <form method="post" action="Food.php">
                <input type="submit" class="btn btn-primary" id="btnChoco" name="btnChoco" value="Select">
            </form>
        </div>
    </div>

    //Item 2
    <div class="card" style="width: 18rem; border-color: <?php echo $banana ?>">
        <img class="card-img-top" src="images/banana.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Banana</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <form method="post" action="Food.php">
                <input type="submit" class="btn btn-primary" id="btnBanana" name="btnBanana" value="Select">
            </form>
        </div>
    </div>

    //Item 3
    <div class="card" style="width: 18rem; border-color: <?php echo $chicken?>">
        <img class="card-img-top" src="images/chicken.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Fried Chicken</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
            <form method="post" action="Food.php">
                <input type="submit" class="btn btn-primary" id="btnChick" name="btnChick" value="Select">
            </form>
        </div>
    </div>
</div>
</body>
</html>
