<?php
    include "Modal.php";

    $type = $_POST["type"];
    $title = $_POST["title"];
    $amount = $_POST["amount"];
    $description = $_POST["description"];
    $date = $_POST["date"];

    TransactionModal::CreateTransaction($type, $title, $amount, $description, $date);

    header("location: " . $_SERVER["HTTP_REFERER"]);