<?php
session_start();
require_once("requests.php");

$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
$user= isset($_SESSION["user"][0])? $_SESSION["user"][0]: null;
$admin = isset($user["ADMIN"])?  $user["ADMIN"]: 0;


if (isset($get["action"])) {
    switch ($get["action"]) {
        case "insertClient":
            if(empty($post["client_id"])) {
                insert_client($post["client_nom"], $post["client_prenom"], $post["client_datedenaissance"],$post["client_password"],$post["client_administrateur"]);
            }
            else{

                edit_client($post["client_id"],$post["client_nom"], $post["client_prenom"], $post["client_datedenaissance"],$post["client_password"],$post["client_administrateur"]);
            }
               
            break;
        case "insertReservation":
            $reservation_client = $_SESSION["user"][0]["ID"];
            $reservation_date = date("m/d/Y");
          insert_reservation($post["reservation_circuit"], $reservation_client, $reservation_date);
            break;
        case "insertCircuit":
           insert_circuit($post["circuit_descriptif"], $post["circuit_villedepart"], $post["circuit_paysdepart"], $post["circuit_villearrivee"], $post["circuit_paysarrivee"], $post["circuit_datedepart"], $post["circuit_datearrivee"], $post["circuit_duree"], $post["circuit_places"], $post["circuit_prix"]);
            break;
        case "insertEtape":
            insert_etape($post["etape_circuit"], $post["etape_lieu"], $post["etape_ordre"], $post["etape_date"], $post["etape_duree"]);
            break;
        case "insertLieu":
            if(!empty($post["lieu_id"])){

                edit_lieu($post["lieu_id"],$post["lieu_nom"], $post["lieu_ville"], $post["lieu_pays"], $post["lieu_descriptif"], $post["lieu_prix"]);
    }
            else{
             
                echo "insert";
                insert_lieu($post["lieu_nom"], $post["lieu_ville"], $post["lieu_pays"], $post["lieu_descriptif"], $post["lieu_prix"]);
            }
            break;

        case "signUp":
            signup($post["txt_last_name"], $post["txt_first_name"], $post["txt_date_naissance"],$post["txt_password"],$post["txt_password_confirm"]);
            break;
        case "login":
            $login = login($post["username"], $post["password"]);
            if(empty($login)){
                echo "erreur";

              
            }
            else{
                $_SESSION["user"] = $login;
                header("Location: index.php");

            }
            break;

        case "disconnect":
            unset($_SESSION['user']);
            header("Location: index.php");
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
            
            
        case "editCircuit":
            try{edit_circuit($get["viewId"],$post["descritptif"],$post["villeDepart"],$post["paysDepart"],$post["villeArrivee"],
                $post["paysArrive"],$post["dateDepart"],$post["dateArrivee"],$post["duree"],$post["nbrPlaceDisponible"],
                $post["prixInscription"]);
            }
            catch (Exception $e){
               // var_dump($e);
            }

            break;
    }
}

if (isset($get["view"])) {
    switch ($get["view"]) {
    case "login":
        require_once("view/login.php");
        break;
    case "signup":
        require_once("view/signup.php");
        break;
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
    case "browseCircuit":
        require_once("view/browseCircuit.php");
        break;

    default:
        require_once("view/home.php");
        break;
    }
} else {
    require_once("view/home.php");
}