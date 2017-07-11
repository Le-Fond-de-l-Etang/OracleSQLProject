<html>
<head>
    <meta charset="UTF-8">
    <title>Projet Oracle</title>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="bower_components/jquery-ui/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="bower_components/jquery-ui/themes/base/theme.css">
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>
<div class="container">

    <h1>Projet Oracle</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Connexion</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="index.php?action=signUp&view=signup">
                <div class="form-group has-feedback ">
                    <label for="txt_last_name">Nom :</label>
                    <input type="text" name="txt_last_name" id="txt_last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_first_name">prenom :</label>
                    <input type="text" name="txt_first_name" id="txt_first_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_date_naissance">Date de naissance :</label>
                    <input type="date" name="txt_date_naissance" id="txt_date_naissance" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_password">Mot de passe :</label>
                    <input type="password" name="txt_password" id="txt_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txt_password_confirm">Confirmation :</label>
                    <input type="password" name="txt_password_confirm" id="txt_password_confirm" class="form-control">
                </div>
                <button type="submit" class="btn btn-succes"><i class=" glyphicon glyphicon-log-in"></i>&nbsp; s'inscrire</button>

            </form>
        </div>

    </div>
</body>
</html>