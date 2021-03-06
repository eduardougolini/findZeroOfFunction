<?php

    include './CordasService.php';
    include './BisseccionService.php';
    include './NewtonService.php';
    include './PegasusService.php';
    
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
        return PegasusService::calculate($userFunction, $inferiorLimit, $superiorLimit, $userError);
    } else {
        return NewtonService::calculate($userFunction, $inferiorLimit, $userError);
    }