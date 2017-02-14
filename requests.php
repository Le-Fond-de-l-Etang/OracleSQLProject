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
    $query = "INSERT INTO Client (Nom, Prenom, DateDeNaissance) VALUES (:nom, :prenom, :dateDeNaissance)";
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



/// Récupération des données de la database

function select_clients() {
    $query = "SELECT * FROM Client";
    global $connection;
    return $connection->prepare($query)->execute();
}
function select_circuits() {
    $query = "SELECT * FROM Circuit";
    global $connection;
    return $connection->prepare($query)->execute();
}
function select_lieux() {
    $query = "SELECT * FROM LieuAVisiter";
    global $connection;
    return $connection->prepare($query)->execute();
}