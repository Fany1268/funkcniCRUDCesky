<?php


// Autoloader načte třídy
function nactiTridu($trida) : void
{
    require("tridy/$trida.php");
}
spl_autoload_register("nactiTridu");



//include_once('functions.php');

$insertdata = new DB_con();

if (isset($_POST['insert'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];

    $sql = $insertdata->insert($fname, $lname, $email, $phonenumber, $address);

    if ($sql) {
        echo "<script>alert('Úspěšně uloženo!');</script>";
        echo "<script>window.location.href='index.php'</script>";

    } else {
        echo "<script>alert('Něco je špatně! Zkuste znovu!');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div class="container">
    <a href="index.php" class="btn btn-primary mt-3">Zpět</a>
    <hr>
    <h1 class="mt-5">Vložení záznamu</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-3">
            <label for="firstname" class="form-label">Jméno</label>
            <input type="text" placeholder="Napište jméno" class="form-control" name="firstname" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Příjmení</label>
            <input type="text" placeholder="Napište příjmení" class="form-control" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" placeholder="Napište email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phonenumber">Telefoní číslo</label>
            <input type="text" placeholder="Zadejte telefon" class="form-control" name="phonenumber" required>
        </div>
        <div class="mb-3">
            <label for="address">Adresa</label>
            <textarea name="address"cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <button type="submit" name="insert" class="btn btn-success">Vlož</button>
    </form>
</div>

<footer class="a">


    <div style="border-radius: 5px; justify-content:end; margin: 10px auto;;width: 25%;border-color: #3A363BFF; background-color:;">

        <nav aria-label="Stránkování">

            <ul class="pagination pagination-sm, justify-content-center">



                <li class="page-item"><a class="page-link" href="index.php">1</a></li>
                <li class="page-item active"><a class="page-link" href="insert.php">2</a></li>



                </li>
            </ul>
        </nav>
    </div>



</footer>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>



