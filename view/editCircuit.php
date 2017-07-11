<html>
    <head>
        <meta charset="UTF-8">
        <title>Circuit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel=stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
        <link rel=stylesheet" href="assets/css/bootflat.css">
        <style>
            .form-group label, .controls {
                float: none;
            }
            .modal-footer button:first-child {
                float: left;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="index.php">Index</a></li>
                <li><a href="index.php?view=manageCircuits">Circuits</a></li>
                <li class="active"><?php echo $get["viewId"]; ?></li>
            </ol>

            <button id="edit" data-toggle="modal" data-target="#editCircuitModal" class="btn btn-success pull-rigth"><i class="glyphicon glyphicon-edit"></i> </button>
            <?php $circuit = select_circuit($get["viewId"])[0];
            echo "<h2>Informations du circuit :</h2>";
            echo "<span><strong>Id :</strong> " . $circuit["ID"] . "</span><br/>";
            echo "<span><strong>Descriptif :</strong> " . $circuit["DESCRIPTIF"] . "</span><br/>";
            echo "<span><strong>Ville de départ :</strong> " . $circuit["VILLEDEPART"] . "</span><br/>";
            echo "<span><strong>Pays de départ :</strong> " . $circuit["PAYSDEPART"] . "</span><br/>";
            echo "<span><strong>Ville d'arrivée :</strong> " . $circuit["VILLEARRIVEE"] . "</span><br/>";
            echo "<span><strong>Pays d'arrivée :</strong> " . $circuit["PAYSARRIVEE"] . "</span><br/>";
            echo "<span><strong>Date de départ :</strong> " . $circuit["DATEDEPART"] . "</span><br/>";
            echo "<span><strong>Date d'arrivée :</strong> " . $circuit["DATEARRIVEE"] . "</span><br/>";
            echo "<span><strong>Durée :</strong> " . $circuit["DUREE"] . "</span><br/>";
            echo "<span><strong>Places disponibles :</strong> " . $circuit["NBRPLACEDISPONIBLE"] . "</span><br/>";
            echo "<span><strong>Prix de l'inscription :</strong> " . $circuit["PRIXINSCRIPTION"] . "</span><br/>"; ?>
            
            <ul class="nav nav-tabs">
                <li><a href="#clients" data-toggle="tab">Clients</a></li>
                <li><a href="#etapes" data-toggle="tab">Etapes</a></li>
            </ul>
            
            <div class="tab-content">
                <div class="tab-pane" id="clients">
                    <h2>Liste des clients du circuit :</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de réservation</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $reservations = select_reservations($get["viewId"]);
                            foreach($reservations as $reservation) {
                                echo "<tr>";
                                echo "<td>" . $reservation[0] . "</td>";
                                echo "<td>" . $reservation["NOM"] . "</td>";
                                echo "<td>" . $reservation["PRENOM"] . "</td>";
                                echo "<td>" . $reservation["DATERESERVATION"] . "</td>";
                                echo "<td><a href='index.php?action=deleteReservation&actionId=".$reservation[0]."&viewId=".$get["viewId"]."&view=editCircuit'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
                                echo "</tr>";
                            } ?>
                        </tbody>
                    </table>
                    <!--<div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCircuitClientModal">Ajouter un client au circuit</button></div>-->
                </div>

                <div class="tab-pane" id="etapes">
                    <h2>Liste des étapes du circuit :</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Ordre</th>
                                <th>Lieu</th>
                                <th>Durée</th>
                                <th>Date de l'étape</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $etapes = select_etapes($get["viewId"]);
                            foreach($etapes as $etape) {
                                echo "<tr>";
                                echo "<td>" . $etape[0] . "</td>";
                                echo "<td>" . $etape["ORDRE"] . "</td>";
                                echo "<td>" . $etape["IDLIEU"] . "</td>";
                                echo "<td>" . $etape["DUREE"] . "</td>";
                                echo "<td>" . $etape["DATEETAPE"] . "</td>";
                                echo "<td><a href='index.php?action=deleteEtape&actionId=".$etape[0]."&viewId=".$get["viewId"]."&view=editCircuit'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
                                echo "<tr>";
                            } ?>
                        </tbody>
                    </table>
                    <div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCircuitEtapeModal">Ajouter une étape au circuit</button></div>
                </div>
            </div>
            
            
            
            
            
            
            <!-- Modal d'ajout de client au circuit -->
            <div id="addCircuitClientModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="index.php?action=insertReservation&view=editCircuit&viewId=<?php echo $get["viewId"]; ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout de client au circuit</h4>
                            </div>
                            <div class="modal-body">
                                <p>Sélectionnez un client et la date de réservation à enregistrer :</p>
                                
                                <input required value="<?php echo $get["viewId"]; ?>" name="reservation_circuit" type="hidden">

                                <div class="form-group">
                                    <label for="reservation_client" class="control-label col-md-4">Client</label>
                                    <div class="controls col-md-8 ">
                                        <select required class="input-md form-control" id="reservation_client" name="reservation_client" type="text">
                                            <?php $clients = select_clients();
                                            foreach($clients as $client) {
                                                echo "<option value='".$client["ID"]."'>" . $client["PRENOM"] . " " . $client["NOM"] . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="reservation_date" class="control-label col-md-4">Date de réservation</label>
                                    <div class="controls col-md-8 ">
                                        <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" value="" data-date-format="dd/mm/yyyy" id="reservation_date" name="reservation_date" type="text">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal de modification du circuit -->
            <div id="editCircuitModal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="index.php?action=editCircuit&view=editCircuit&viewId=<?php echo $get["viewId"]; ?>">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edition</h4>
                        </div>
                        <div class="modal-body">
                          
                                <div class="form-group">
                                    <label for="txt_descriptif">Descriptif :</label>
                                    <input type="text" name="descritptif" class="form-control" id="txt_descriptif" value="<?php echo $circuit["DESCRIPTIF"]?>">
                                </div>
                                <div class="form-group">
                                    <label for="txt_villeDepart">Ville depart :</label>
                                    <input type="text" name="villeDepart" class="form-control" id="txt_villeDepart" value="<?php echo $circuit["VILLEDEPART"]?>">
                                </div>
                            <div class="form-group">
                                <label for="txt_paysDepart">Pays depart :</label>
                                <input type="text" name="paysDepart" class="form-control" id="txt_paysDepart" value="<?php echo $circuit["PAYSDEPART"]?>">
                            </div>
                                <div class="form-group">
                                    <label for="txt_villeArrivee">Ville arrivée :</label>
                                    <input type="text" name="villeArrivee" class="form-control" id="txt_villeArrivee" value="<?php echo $circuit["VILLEARRIVEE"]?>">
                                </div>

                            <div class="form-group">
                                <label for="txt_paysArrivee">Pays arrivée :</label>
                                <input type="text" name="paysArrive" class="form-control" id="txt_paysArrivee" value="<?php echo $circuit["PAYSARRIVEE"]?>">
                            </div>

                            <div class="form-group">
                                <label for="txt_dateDepart">Date départ :</label>
                                <input type="text" name="dateDepart" class="form-control datepicker" id="txt_dateDepart" value="<?php echo $circuit["DATEDEPART"]?>">
                            </div>

                            <div class="form-group">
                                <label for="txt_dateArrivee">Date arrivée :</label>
                                <input type="text" name="dateArrivee" class="form-control datepicker" id="txt_dateArrivee" value="<?php echo $circuit["DATEARRIVEE"]?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_duree">durée :</label>
                                <input type="text" name="duree" class="form-control" id="txt_duree" value="<?php echo $circuit["DUREE"]?>">
                            </div>

                            <div class="form-group">
                                <label for="txt_nbrPlaceDisponible">Nombre de place disponible :</label>
                                <input type="text" name="nbrPlaceDisponible" class="form-control" id="txt_nbrPlaceDisponible" value="<?php echo $circuit["NBRPLACEDISPONIBLE"]?>">
                            </div>
                            <div class="form-group">
                                <label for="txt_prixInscription">Prix Inscription :</label>
                                <input type="text" name="prixInscription" class="form-control" id="txt_prixInscription" value="<?php echo $circuit["PRIXINSCRIPTION"]?>">
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>




            <!-- Modal d'ajout d'étape au circuit -->
            <div id="addCircuitEtapeModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="index.php?action=insertEtape&view=editCircuit&viewId=<?php echo $get["viewId"]; ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout d'étape au circuit</h4>
                            </div>
                            <div class="modal-body">
                                <p>Renseignez le lieu et les informations de l'étape :</p>

                                <input required value="<?php echo $get["viewId"]; ?>" name="etape_circuit" type="hidden">
                                
                                <div class="form-group">
                                    <label for="etape_lieu" class="control-label col-md-4">Lieu de l'étape :</label>
                                    <div class="controls col-md-8 ">
                                        <select required class="input-md form-control" id="etape_lieu" name="etape_lieu" type="text">
                                            <?php $lieux = select_lieux();
                                            foreach($lieux as $lieu) {
                                                echo "<option value='".$lieu["ID"]."'>" . $lieu["NOMLIEU"] . " (" . $lieu["DESCRIPTIF"] . ")</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="etape_date" class="control-label col-md-4">Date de l'étape</label>
                                    <div class="controls col-md-8 ">
                                        <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" value="" data-date-format="dd/mm/yyyy" id="etape_date" name="etape_date" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="etape_duree" class="control-label col-md-4">Durée (heures)</label>
                                    <div class="controls col-md-8 ">
                                        <input required class="input-md  textinput textInput form-control" value="" id="etape_duree" name="etape_duree" type="number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="etape_ordre" class="control-label col-md-4">Ordre</label>
                                    <div class="controls col-md-8 ">
                                        <input required class="input-md textinput textInput form-control" id="etape_ordre" name="etape_ordre" type="number">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <script>
            $(".datepicker").datepicker();
        </script>
    </body>
</html>    