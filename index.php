<?php

$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

if (isset($get["action"])) {
    require_once("requests.php");
    switch ($get["action"]) {
    case "insertClient":
        //insert_client($nom, $prenom, $dateDeNaissance)
        break;
    case "insertCircuit":
        insert_circuit($get["circuit_descriptif"], $get["circuit_villedepart"], $get["circuit_paysdepart"], $get["circuit_villearrivee"], $get["circuit_paysarrivee"], $get["circuit_datedepart"], $get["circuit_datearrivee"], $get["circuit_dure"], $get["circuit_places"], $get["circuit_prix"]);
        break;
    }
}

if (isset($get["view"])) {
    switch ($get["view"]) {
    case "createClient":
        require_once("view/createClient.php");
        break;
    case "createCircuit":
        require_once("view/createCircuit.php");
        break;
    case "editCircuit":
        require_once("view/editCircuit.php");
        break;
    case "createLieu":
        require_once("view/createLieu.php");
        break;
    default:
        break;
    }
}