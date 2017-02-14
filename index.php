<?php

$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

if (isset($get["action"])) {
    require_once("requests.php");
    switch ($get["action"]) {
    case "insertClient":
        insert_client($get["client_nom"], $get["client_prenom"], $get["client_datedenaissance"]);
        break;
    case "insertReservation":
        insert_reservation($get["reservation_circuit"], $get["reservation_client"], $get["reservation_date"]);
        break;
    case "insertCircuit":
        insert_circuit($get["circuit_descriptif"], $get["circuit_villedepart"], $get["circuit_paysdepart"], $get["circuit_villearrivee"], $get["circuit_paysarrivee"], $get["circuit_datedepart"], $get["circuit_datearrivee"], $get["circuit_dure"], $get["circuit_places"], $get["circuit_prix"]);
        break;
    case "insertEtape":
        insert_etape($get["etape_circuit"], $get["etape_lieu"], $get["etape_ordre"], $get["etape_date"], $get["etape_duree"]);
        break;
    case "insertLieu":
        insert_lieu($get["lieu_nom"], $get["lieu_ville"], $get["lieu_pays"], $get["lieu_descriptif"], $get["lieu_prix"]);
        break;
    }
}

if (isset($get["view"])) {
    switch ($get["view"]) {
    case "manageClients":
        require_once("view/manageClients.php");
        break;
    case "manageCircuits":
        require_once("view/manageCircuits.php");
        break;
    case "editCircuit":
        require_once("view/editCircuit.php");
        break;
    case "manageLieux":
        require_once("view/manageLieux.php");
        break;
    default:
        require_once("view/home.php");
        break;
    }
} else {
    require_once("view/home.php");
}