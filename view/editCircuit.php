<html>
    <head>
        <meta charset="UTF-8">
        <title>Circuit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel=stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
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
            <span><a href="index.php">Index</a> > <a href="index.php?view=manageCircuits">Circuits</a> > <?php echo $get["viewId"]; ?></span>
            
            <?php $client = select_circuit($get["viewId"])[0];
            echo "<h2>Informations du circuit :</h2>";
            echo "<span><strong>Id :</strong> " . $client["id"] . "</span><br/>";
            echo "<span><strong>Descriptif :</strong> " . $client["descriptif"] . "</span><br/>";
            echo "<span><strong>Ville de départ :</strong> " . $client["villedepart"] . "</span><br/>";
            echo "<span><strong>Pays de départ :</strong> " . $client["paysdepart"] . "</span><br/>";
            echo "<span><strong>Ville d'arrivée :</strong> " . $client["villearrivee"] . "</span><br/>";
            echo "<span><strong>Pays d'arrivée :</strong> " . $client["paysarrivee"] . "</span><br/>";
            echo "<span><strong>Date de départ :</strong> " . $client["datedepart"] . "</span><br/>";
            echo "<span><strong>Date d'arrivée :</strong> " . $client["datearrivee"] . "</span><br/>";
            echo "<span><strong>Durée :</strong> " . $client["duree"] . "</span><br/>";
            echo "<span><strong>Places disponibles :</strong> " . $client["nbrplacedisponible"] . "</span><br/>";
            echo "<span><strong>Prix de l'inscription :</strong> " . $client["prixinscription"] . "</span><br/>"; ?>
            
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
                                echo "<td>" . $reservation[0] . "</td>";
                                echo "<td>" . $reservation["nom"] . "</td>";
                                echo "<td>" . $reservation["prenom"] . "</td>";
                                echo "<td>" . $reservation["dateReservation"] . "</td>";
                                echo "<td><a href='index.php?action=deleteReservation&actionId=".$reservation[0]."&viewId=".$get["viewId"]."&view=editCircuit'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
                            } ?>
                        </tbody>
                    </table>
                    <div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCircuitClientModal">Ajouter un client au circuit</button></div>
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
                                echo "<td>" . $etape[0] . "</td>";
                                echo "<td>" . $etape["ordre"] . "</td>";
                                echo "<td>" . $etape["idLieu"] . "</td>";
                                echo "<td>" . $etape["duree"] . "</td>";
                                echo "<td>" . $etape["dateEtape"] . "</td>";
                                echo "<td><a href='index.php?action=deleteEtape&actionId=".$etape[0]."&viewId=".$get["viewId"]."&view=editCircuit'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>";
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
                                                echo "<option value='".$client["id"]."'>" . $client["prenom"] . " " . $client["nom"] . "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="reservation_date" class="control-label col-md-4">Date de réservation</label>
                                    <div class="controls col-md-8 ">
                                        <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" value="" data-date-format="yyyy/mm/dd" id="reservation_date" name="reservation_date" type="text">
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
                                                echo "<option value='".$lieu["id"]."'>" . $lieu["nomLieu"] . " (" . $lieu["descriptif"] . ")</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="etape_date" class="control-label col-md-4">Date de l'étape</label>
                                    <div class="controls col-md-8 ">
                                        <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" value="" data-date-format="yyyy/mm/dd" id="etape_date" name="etape_date" type="text">
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