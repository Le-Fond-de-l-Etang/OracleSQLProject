<?php

const PDO_DATABASE = "(DESCRIPTION =
    (ADDRESS_LIST =
        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
        (SERVICE_NAME = XE)
    )
)";
const PDO_USERNAME = "voyage";
const PDO_PASSWORD = "desireless";

$connection = new PDO("oci:dbname=".PDO_DATABASE, PDO_USERNAME, PDO_PASSWORD);
/*const PDO_USERNAME = "root";
const PDO_PASSWORD = "toor";

$connection = new PDO("mysql:host=localhost;dbname=voyage", PDO_USERNAME, PDO_PASSWORD);
*/

///execution des requetes
function exec_query($query,$array){
    global $connection;
    try {
       return $connection->prepare($query)->execute($array);
    }
    catch (Exception $e){
       // var_dump($e);
        return $e;
    }


}

/// Insertions dans les tables

function insert_circuit($descriptif, $villeDepart, $paysDepart, $villeArrivee, $paysArrivee, $dateDepart, $dateArrivee, $duree, $nbrPlaceDisponible, $prixInscription) {
    $query = "INSERT INTO CIRCUIT(DESCRIPTIF, VILLEDEPART, PAYSDEPART, VILLEARRIVEE, PAYSARRIVEE, DUREE, NBRPLACEDISPONIBLE, PRIXINSCRIPTION, DATEDEPART, DATEARRIVEE) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return exec_query($query,[$descriptif, $villeDepart, $paysDepart, $villeArrivee, $paysArrivee, $duree, $nbrPlaceDisponible, $prixInscription, $dateDepart, $dateArrivee]);
}
function insert_reservation($idCircuit, $idClient, $dateReservation) {

    $data = array(":IDCIRCUIT"=>$idCircuit,":IDCLIENT"=>$idClient,":DATERESERVATION"=>$dateReservation );
   
    $query = "INSERT INTO Reservation (IDCIRCUIT, IDCLIENT, DATERESERVATION) VALUES (:IDCIRCUIT, :IDCLIENT, :DATERESERVATION)";
    global $connection;
   return $connection->prepare($query)->execute($data);
}
function insert_client($nom, $prenom, $dateDeNaissance,$password,$admin) {
    $query = "INSERT INTO Client (NOM, PRENOM, DATEDENAISSANCE, ADMIN, USERNAME, PASSWORD) VALUES (:NAME, :FIRSTNAME, :BIRTHDATE, :ADMIN, :USERNAME, :PASSWORD)";
    global $connection;
    $username = substr($prenom,0,2).substr($nom,0,4);

    $newDate = date("d/m/Y", strtotime($dateDeNaissance));
    $admin = (isset($admin) ? 1 : 0 );
 //   var_dump($admin);
    $connection->prepare($query)->execute(["NAME" => $nom, "FIRSTNAME" => $prenom, "BIRTHDATE" => $newDate,"ADMIN" => $admin,"USERNAME" => $username,"PASSWORD" => hash("sha256",$password)]);
}

function edit_client($id,$nom, $prenom, $dateDeNaissance,$password,$admin) {
    $query = "UPDATE Client SET  NOM = :NAME , PRENOM = :FIRSTNAME, DATEDENAISSANCE= :BIRTHDATE, ADMIN= :ADMIN,PASSWORD=:PASSWORD WHERE ID= :ID";
    global $connection;

    $newDate = date("d/m/Y", strtotime($dateDeNaissance));
    $admin = (isset($admin) ? 1 : 0 );
 //   var_dump($admin);
 $connection->prepare($query)->execute(["ID"=>$id,"NAME" => $nom,"FIRSTNAME" => $prenom, "BIRTHDATE" => $newDate,"ADMIN" => $admin,"PASSWORD" => hash("sha256",$password)]);
}
function insert_etape($idCircuit, $idLieu, $ordre, $dateEtape, $duree) {
    $query = "INSERT INTO Etape (IdCircuit, IdLieu, Ordre, DateEtape, Duree) VALUES (?, ?, ?, ?, ?)";
    global $connection;
    $connection->prepare($query)->execute([$idCircuit, $idLieu, $ordre, $dateEtape, $duree]);
}
function insert_lieu($nom, $ville, $pays, $descriptif, $prixVisite) {
    $query = "INSERT INTO LieuAVisiter (NomLieu, Ville, Pays, Descriptif, PrixVisite) VALUES (?, ?, ?, ?, ?)";
    global $connection;
    $connection->prepare($query)->execute([$nom, $ville, $pays, $descriptif, $prixVisite]);
}

/// Modification dans les tables


function edit_circuit($id, $descriptif, $villeDepart, $paysDepart, $villeArrivee, $paysArrivee, $dateDepart, $dateArrivee, $duree, $nbrPlaceDisponible, $prixInscription){
    $array = array(":id" => $id, ":descriptif" => $descriptif, ":villeDepart" => $villeDepart,":paysDepart"=>$paysDepart,
        ":villeArrivee"=>$villeArrivee,":paysArrivee"=>$paysArrivee,":dateDepart"=>$dateDepart,":dateArrivee"=>$dateArrivee,
        ":duree"=>$duree,":nbrPlaceDisponible"=>$nbrPlaceDisponible,":prixInscription"=>$prixInscription);

    $query = "UPDATE CIRCUIT set DESCRIPTIF = :descriptif ,VILLEDEPART = :villeDepart, PAYSDEPART = :paysDepart ,
 VILLEARRIVEE = :villeArrivee ,PAYSARRIVEE = :paysArrivee , DATEDEPART = :dateDepart , DATEARRIVEE= :dateArrivee,
  DUREE = :duree , NBRPLACEDISPONIBLE = :nbrPlaceDisponible, PRIXINSCRIPTION = :prixInscription where ID =:id";
    global $connection;
   $connection->prepare($query)->execute($array);
}
function edit_lieu($id, $nomLieu, $ville, $pays, $descriptif,$prixVisite){
    $array =array(":id" => $id,":nomLieu"=>$nomLieu, ":descriptif" => $descriptif, ":ville" => $ville,
        ":pays" =>$pays,":prixVisite"=>$prixVisite);

    $query ="UPDATE LIEUAVISITER SET NOMLIEU =:nomLieu , VILLE =:ville , PAYS =:pays ,DESCRIPTIF =:descriptif ,
 PRIXVISITE =:prixVisite WHERE ID =:id";
    global $connection;
    $connection->prepare($query)->execute($array);
    
}


/// Suppression dans les tables

function delete_circuit($id) {
    $query = "DELETE FROM Circuit WHERE id = ?";
    global $connection;
    $connection->prepare($query)->execute([$id]);
}
function delete_client($id) {
    $query = "DELETE FROM Client WHERE id = ?";
    global $connection;
    $connection->prepare($query)->execute([$id]);
}
function delete_lieu($id) {
    $query = "DELETE FROM LieuAVisiter WHERE id = ?";
    global $connection;
    $connection->prepare($query)->execute([$id]);
}
function delete_reservation($id) {
    $query = "DELETE FROM Reservation WHERE id = ?";
    global $connection;
    $connection->prepare($query)->execute([$id]);
}
function delete_etape($id) {
    $query = "DELETE FROM Etape WHERE id = ?";
    global $connection;
    $connection->prepare($query)->execute([$id]);
}



/// Récupération des données de la database

function select_clients() {
    $query = "SELECT * FROM Client";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute();
    return $operation->fetchAll();
}
function select_circuits() {
    $query = "SELECT * FROM Circuit";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute();
    return $operation->fetchAll();
}
function select_lieux() {
    $query = "SELECT * FROM LieuAVisiter";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute();
    return $operation->fetchAll();
}

function select_circuit($id) {
    $query = "SELECT * FROM Circuit WHERE id = ?";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute([$id]);
    return $operation->fetchAll();
}
function select_reservations($circuitId) {
    $query = "SELECT * FROM Reservation r, Client c WHERE c.id = r.idClient AND r.idCircuit = ?";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute([$circuitId]);
    return $operation->fetchAll();
}
function select_etapes($circuitId) {
    $query = "SELECT * FROM Etape e, LieuAVisiter l WHERE l.id = e.idLieu AND e.idCircuit = ?";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute([$circuitId]);
    return $operation->fetchAll();
}


function login($username,$password){
    $query ="SELECT ID,NOM,PRENOM,ADMIN FROM CLIENT WHERE USERNAME= :username and PASSWORD = :password";
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute(["username"=>$username,"password"=>hash("sha256",$password) ]);
    return $operation->fetchAll();

}

function getRemainingPlaces($id){
    $query = "select NBRPLACEDISPONIBLE-(SELECT COUNT(*) from RESERVATION where IDCIRCUIT =:ID) as PLACERESTANTE from CIRCUIT where ID = :ID";
    $param = array(":ID"=>$id);
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute($param);
    return $operation->fetch();

}
function isCircuitReserved($idClient,$idCircuit){
    $query= "select count(*) from RESERVATION where IDCLIENT = :idclient and IDCIRCUIT = :idcircuit";
    $param = array(":idclient"=>$idClient,":idcircuit"=>$idCircuit);
    global $connection;
    $operation = $connection->prepare($query);
    $operation->execute($param);

    $data =$operation->fetch()[0];

    return ($data == 0);
}


function signup($last_name, $first_name, $date_naissance,$password,$password_confirm){
    $fields=["last_name"=>$last_name,"first_name"=>$first_name,"date_de_naissance"=>$date_naissance,"password"=>$password,"password_confirm"=>$password_confirm];
    $fieldsWithError = [];
    foreach ($fields as $key =>$field){
        if (empty($field)){
           array_push($fieldsWithError,$field);
        }
        else{
            switch ($key){
                case "date_de_naissance":

                    $dt = DateTime::createFromFormat("Y-m-d", $date_naissance);

                    if ($dt == false || array_sum($dt->getLastErrors())) {
                        array_push($fieldsWithError,$field);
                    }
                    else{

                        if( $dt > new DateTime()|| $dt <new DateTime("1900-01-01"))

                        array_push($fieldsWithError,$field);
                    }
                    break;
                case "password":
                    if($field != $password_confirm ){
                        array_push($fieldsWithError,$field);
                    }
                    break;
                case "first_name":
                    if(strlen($field)>50){
                        array_push($fieldsWithError,$field);
                    }
                    break;
                case "Last_name":
                    if(strlen($field)>50){
                        array_push($fieldsWithError,$field);
                    }
                    break;

            }
        }
    }
   
    if(empty($fieldsWithError)){
        insert_client($last_name,$first_name,$date_naissance,$password,0);
        header("Location: /voyage");

    }
    else{
        
    }



}