<?php

require_once("requests.php");

$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if (isset($get["action"])) {
    switch ($get["action"]) {
    case "insertClient":
        insert_client($post["client_nom"], $post["client_prenom"], $post["client_datedenaissance"]);
        break;
    case "insertReservation":
        insert_reservation($post["reservation_circuit"], $post["reservation_client"], $post["reservation_date"]);
        break;
    case "insertCircuit":
        insert_circuit($post["circuit_descriptif"], $post["circuit_villedepart"], $post["circuit_paysdepart"], $post["circuit_villearrivee"], $post["circuit_paysarrivee"], $post["circuit_datedepart"], $post["circuit_datearrivee"], $post["circuit_duree"], $post["circuit_places"], $post["circuit_prix"]);
        break;
    case "insertEtape":
        insert_etape($post["etape_circuit"], $post["etape_lieu"], $post["etape_ordre"], $post["etape_date"], $post["etape_duree"]);
        break;
    case "insertLieu":
        insert_lieu($post["lieu_nom"], $post["lieu_ville"], $post["lieu_pays"], $post["lieu_descriptif"], $post["lieu_prix"]);
        break;
    
    case "deleteClient":
        delete_client($get["actionId"]);
        break;
    case "deleteCircuit":
        delete_circuit($get["actionId"]);
        break;
    case "deleteLieu":
        delete_lieu($get["actionId"]);
        break;
    case "deleteReservation":
        delete_reservation($get["actionId"]);
        break;
    case "deleteEtape":
        delete_etape($get["actionId"]);
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