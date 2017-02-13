<html>
    <head>
        <meta charset="UTF-8">
        <title>Circuits</title>
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
            
            <h2>Liste des circuits :</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Descriptif</th>
                        <th>Ville de départ</th>
                        <th>Pays de départ</th>
                        <th>Ville d'arrivée</th>
                        <th>Pays d'arrivée</th>
                        <th>Date de départ</th>
                        <th>Date d'arrivée</th>
                        <th>Durée</th>
                        <th>Places dispo.</th>
                        <th>Prix Inscription</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
            <div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addCircuitModal">Ajouter un circuit</button></div>
            
            
            
            <!-- Modal d'ajout de circuit -->
            <div id="addCircuitModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="./">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout de circuit</h4>
                            </div>
                            <div class="modal-body">
                                <p>Renseignez les informations du circuit à ajouter ci-dessous.</p>
                                <input type="hidden" name="action" value="addCircuit">

                                    <div class="form-group">
                                        <label for="circuit_descriptif" class="control-label col-md-4">Descriptif</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="circuit_descriptif" maxlength="100" name="circuit_descriptif" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_villedepart" class="control-label col-md-4">Ville de départ</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="circuit_villedepart" maxlength="30" name="circuit_villedepart" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_paysdepart" class="control-label col-md-4">Pays de départ</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="circuit_paysdepart" maxlength="30" name="circuit_paysdepart" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_villearrivee" class="control-label col-md-4">Ville d'arrivée</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="circuit_villearrivee" maxlength="30" name="circuit_villearrivee" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_paysarrivee" class="control-label col-md-4">Pays d'arrivée</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="circuit_paysarrivee" maxlength="30" name="circuit_paysarrivee" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_datedepart" class="control-label col-md-4">Date de départ</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{2}" value="" data-date-format="dd/mm/yy" id="circuit_datedepart" name="circuit_datedepart" type="text">
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="circuit_datearrivee" class="control-label col-md-4">Date d'arrivée</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{2}" value="" data-date-format="dd/mm/yy" id="circuit_datearrivee" name="circuit_datearrivee" type="text">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="circuit_duree" class="control-label col-md-4">Durée (jours)</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" value="" id="circuit_duree" name="circuit_duree" type="number">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="circuit_places" class="control-label col-md-4">Nombre de places disponibles</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" value="" id="circuit_places" name="circuit_places" type="number">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="circuit_prix" class="control-label col-md-4">Prix inscription</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" value="" id="circuit_prix" name="circuit_prix" type="number" step="0.01">
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