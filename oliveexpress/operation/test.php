<?php

include("../connection/db.php");

secondtask();

function firsttask(){

echo"this is the first function";
}

function secondtask()
{
 firsttask();
}
?>