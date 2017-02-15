<?php

/*const PDO_DATABASE = "(DESCRIPTION =
    (ADDRESS_LIST =
        (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    )
    (CONNECT_DATA =
        (SERVICE_NAME = XE)
    )
)";
const PDO_USERNAME = "voyage";
const PDO_PASSWORD = "desireless";

$connection = new PDO("oci:dbname=".PDO_DATABASE, PDO_USERNAME, PDO_PASSWORD);*/
const PDO_USERNAME = "root";
const PDO_PASSWORD = "toor";

$connection = new PDO("mysql:host=localhost;dbname=voyage", PDO_USERNAME, PDO_PASSWORD);



/// Insertions dans les tables

function insert_circuit($descriptif, $villeDepart, $paysDepart, $villeArrivee, $paysArrivee, $dateDepart, $dateArrivee, $duree, $nbrPlaceDisponible, $prixInscription) {
    $query = "INSERT INTO Circuit (Descriptif, VilleDepart, PaysDepart, VilleArrivee, PaysArrivee, DateDepart, DateArrivee, Duree, NbrPlaceDisponible, PrixInscription) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    global $connection;
    $connection->prepare($query)->execute([$descriptif, $villeDepart, $paysDepart, $villeArrivee, $paysArrivee, $dateDepart, $dateArrivee, $duree, $nbrPlaceDisponible, $prixInscription]);
}
function insert_reservation($idCircuit, $idClient, $dateReservation) {
    $query = "INSERT INTO Reservation (IdCircuit, IdClient, DateReservation) VALUES (?, ?, ?)";
    global $connection;
    $connection->prepare($query)->execute([$idCircuit, $idClient, $dateReservation]);
}
function insert_client($nom, $prenom, $dateDeNaissance) {
    $query = "INSERT INTO Client (Nom, Prenom, DateDeNaissance) VALUES (?, ?, ?)";
    global $connection;
    $connection->prepare($query)->execute([$nom, $prenom, $dateDeNaissance]);
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