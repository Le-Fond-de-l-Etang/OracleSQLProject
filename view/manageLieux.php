<html>
    <head>
        <meta charset="UTF-8">
        <title>Circuit </title>
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
            
            <h2>Circuit </h2>
            
            <!-- Affichage en PHP des infos du circuit -->
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Descriptif</th>
                        <th>Prix</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
            <div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addLieuModal">Ajouter un lieu</button></div>
            
            
            
            <!-- Modal d'ajout de lieu -->
            <div id="addLieuModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="index.php?action=insertLieu&view=manageLieux">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout de lieu</h4>
                            </div>
                            <div class="modal-body">
                                <p>Renseignez les informations du lieu à ajouter ci-dessous.</p>
                                
                                    <div class="form-group">
                                        <label for="lieu_nom" class="control-label col-md-4">Nom</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="lieu_nom" maxlength="30" name="lieu_nom" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="lieu_ville" class="control-label col-md-4">Ville</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="lieu_ville" maxlength="30" name="lieu_ville" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="lieu_pays" class="control-label col-md-4">Pays</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="lieu_pays" maxlength="30" name="lieu_pays" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="lieu_descriptif" class="control-label col-md-4">Descriptif</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="lieu_descriptif" maxlength="30" name="lieu_descriptif" type="text" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="lieu_prix" class="control-label col-md-4">Prix</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" value="" id="lieu_prix" name="lieu_prix" type="number" step="0.01">
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