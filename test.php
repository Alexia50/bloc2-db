<?php
include_once 'src/database.php';

$db=new Database();
$pdo=$db->connect(db:'groups');


$st=$pdo->query('SELECT COUNT(*) FROM 'User' ');
echo $st-> fetchColumn(0);
echo "<hr>";
$st



if (isset($_GET['delete'])){
    $delete=$_GET['delete'];
    $nb=deleteFrom($db,'user',suspended);
    echo "$nb supprimé(s)";

}
echo "<hr>";
$st=$db->query('SELECT COUNT(*) FROM 'User' where suspended');
echo $st->fetchColumn(0);