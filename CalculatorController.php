<?php

    include './CordasService.php';
    include './BisseccionService.php';
    include './NewtonService.php';
    
    $method = $_POST["method"];
    $userFunction = $_POST["userFunction"];
    $userError = $_POST["userError"];
    $inferiorLimit = $_POST["inferiorLimit"];
    $superiorLimit = $_POST["superiorLimit"];

    if ($method === "bisseccao") {
        return BisseccionService::calculate($userFunction, $inferiorLimit, $superiorLimit, $userError);
    } else if ($method === "cordas") {
        return CordasService::calculate($userFunction, $inferiorLimit, $superiorLimit, $userError);
    } else if ($method === "pegaso") {
        //pegaso
    } else {
        return NewtonService::calculate($userFunction, $inferiorLimit, $userError);
    }