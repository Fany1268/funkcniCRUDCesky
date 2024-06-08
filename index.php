<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>

<div class="container">
    <h1 class="mt-5">Infomační stránka</h1>
    <a href="insert.php" class="btn btn-success">Jdi vkládat</a>
    <hr>
    <table id="mytable" class="table table-bordered table-striped">
        <thead>
        <th></th>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Email</th>
        <th>Telefoní číslo</th>
        <th>Adresa</th>
        <th>Editovat</th>
        <th>Smazat</th>
        </thead>

        <tbody>
        <?php


        // Autoloader načte třídy
        function nactiTridu($trida) : void
        {
            require("tridy/$trida.php");
        }
        spl_autoload_register("nactiTridu");


        /*
         * Lze místo třídy a vložené Clas DB_con udělat pouze PHP file function.php a načítat ne přes autoloadera viz. výše, ale přes
         * zakomentovanou funkci include_once viz. níže na řádku 44.
         */
        //include_once('functions.php');



        $fetchdata = new DB_con();
        $sql = $fetchdata->fetchdata();
        while($row = mysqli_fetch_array($sql)) {

            ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phonenumber']; ?></td>
                <td><?php echo $row['address']; ?></td>

                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edituj</a></td>
                <td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Smaž</a></td>
            </tr>

            <?php

        }
        ?>
        </tbody>
    </table>
</div>





<footer class="a">


    <div style="border-radius: 5px; justify-content:end; margin: 10px auto;;width: 25%;border-color: #3A363BFF; background-color: ;">
        <nav aria-label="Stránkování">
            <ul class="pagination pagination-sm, justify-content-center">



                <li class="page-item active"><a class="page-link" href="index.php">1</a></li>
                <li class="page-item"><a class="page-link" href="insert.php">2</a></li>


                <li class="page-item">
                    <a class="page-link" href="insert.php" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>

            </ul>
        </nav>
    </div>



</footer>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>


