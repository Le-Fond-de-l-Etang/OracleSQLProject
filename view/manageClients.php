<html>
    <head>
        <meta charset="UTF-8">
        <title>Clients</title>
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
            
            <h2>Liste des clients :</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
            <div class="text-center"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addClientModal">Ajouter un client</button></div>
            
            
            
            <!-- Modal d'ajout de client -->
            <div id="addClientModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <form method="POST" action="index.php?action=insertClient&view=manageClients">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Ajout de client</h4>
                            </div>
                            <div class="modal-body">
                                <p>Renseignez les informations du client à ajouter ci-dessous.</p>

                                    <div class="form-group">
                                        <label for="client_nom" class="control-label col-md-4">Nom</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="client_nom" maxlength="30" name="client_nom" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="client_prenom" class="control-label col-md-4">Prénom</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="input-md  textinput textInput form-control" id="client_prenom" maxlength="30" name="client_prenom" type="text" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="client_datedenaissance" class="control-label col-md-4">Date de naissance</label>
                                        <div class="controls col-md-8 ">
                                            <input required class="datepicker input-md  textinput textInput form-control" pattern="[0-9]{2}/[0-9]{2}/[0-9]{2}" value="" data-date-format="dd/mm/yy" id="client_datedenaissance" name="client_datedenaissance" type="text">
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