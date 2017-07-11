<html>
<head>
    <meta charset="UTF-8">
    <title>Projet Oracle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <h1>Projet Oracle</h1>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Connexion</h3>
        </div>
        <div class="panel-body">
        <form method="post" action="index.php?action=login&view=login">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" id="username" class="form-control">
        </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control">
                </div>
            <button type="submit" class="btn btn-primary"><i class=" glyphicon glyphicon-log-in"></i>&nbsp;Connexion</button>
            <a href="index.php?view=signup" class="btn btn-default"><i class="glyphicon glyphicon-asterisk"></i>&nbsp;Inscription</a>
        </form>


    </div>

</div>
</body>
</html>