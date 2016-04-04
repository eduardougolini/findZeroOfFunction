<?php

    use CordasService;

    $method = $_POST["method"];
    $userFunction = $_POST["userFunction"];
    $userError = $_POST["userError"];
    $inferiorLimit = $_POST["inferiorLimit"];
    $superiorLimit = $_POST["superiorLimit"];

    if ($method === "bisseccao") {
        //bisseccao
    } else if ($method === "cordas") {
        return CordasService::calculate($userFunction, $inferiorLimit, $superiorLimit, $userError);
    } else if ($method === "pegaso") {
        //pegaso
    } else {
        //newton
    }