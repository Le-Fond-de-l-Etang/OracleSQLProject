<html>
    <head>
        <meta charset="UTF-8">
        <title>Lieux à visiter</title>
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
            
            <h2>Informations du circuit :</h2>
            <span>Info : info</span>
            
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

                        </tbody>
                    </table>
                    <div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCircuitEtapeModal">Ajouter une étape au circuit</button></div>
                </div>
            </div>
            
            
            
            
            
            
            <!-- Modal d'ajout de client au circuit -->
            <div id="addCircuitClientModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="./">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout de client au circuit</h4>
                            </div>
                            <div class="modal-body">
                                <p>Sélectionnez un client et la date de réservation à enregistrer :</p>
                                <input type="hidden" name="action" value="addCircuitClient">

                                    <div class="form-group">
                                        <label for="circuit_client" class="control-label col-md-4">Client</label>
                                        <div class="controls col-md-8 ">
                                            <select required class="input-md form-control" id="circuit_client" name="circuit_client" type="text"></select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_clientreservation" class="control-label col-md-4">Date de réservation</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{2}" value="" data-date-format="dd/mm/yy" id="circuit_clientreservation" name="circuit_clientreservation" type="text">
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
                    <form method="POST" action="./">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout d'étape au circuit</h4>
                            </div>
                            <div class="modal-body">
                                <p>Renseignez le lieu et les informations de l'étape :</p>
                                <input type="hidden" name="action" value="addCircuitEtape">

                                    <div class="form-group">
                                        <label for="circuit_etapelieu" class="control-label col-md-4">Lieu de l'étape :</label>
                                        <div class="controls col-md-8 ">
                                            <select required class="input-md form-control" id="circuit_etapelieu" name="circuit_etapelieu" type="text"></select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_etapedate" class="control-label col-md-4">Date de l'étape</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{2}" value="" data-date-format="dd/mm/yy" id="circuit_etapedate" name="circuit_etapedate" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="circuit_etapeduree" class="control-label col-md-4">Durée (heures)</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" value="" id="circuit_etapeduree" name="circuit_etapeduree" type="number">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="circuit_etapeordre" class="control-label col-md-4">Ordre</label>
                                        <div class="controls col-md-8 ">
                                            <select required class="input-md form-control" id="circuit_etapeordre" name="circuit_etapeordre"></select>
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