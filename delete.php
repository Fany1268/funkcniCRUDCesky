<?php


// Autoloader načte třídy
function nactiTridu($trida) : void
{
    require("tridy/$trida.php");
}
spl_autoload_register("nactiTridu");



//include_once('functions.php');

if (isset($_GET['del'])) {
    $userid = $_GET['del'];
    $deletedata = new DB_con();
    $sql = $deletedata->delete($userid);

    if ($sql) {
        echo "<script>alert('Záznam úspěšně smazán!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}

?>

