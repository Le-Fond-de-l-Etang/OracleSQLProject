<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/voyage">Projet Oracle</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="/voyage">Home</a></li>

            <?php
            
            if($admin == 1){
          ?>
                <li><a  href="index.php?view=manageClients">Clients</a></li>
                <li><a href="index.php?view=manageCircuits">Circuits</a></li>
                <li><a href="index.php?view=manageLieux">Lieux à visiter</a></li>
            <?php
            }
            else{
              echo "<li><a href=\"index.php?view=browseCircuit\">Nos voyages</a></li>";
                echo "<li><a href=\"#\">Nos etapes</a></li>";
            }
            ?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if( !isset($user))
            {
                echo '  <li ><a href = "index.php?view=signup" ><span class="glyphicon glyphicon-user" ></span > Inscription</a ></li >';
                echo ' <li ><a href = "index.php?view=login" ><span class="glyphicon glyphicon-log-in" ></span > Login</a ></li >';
            }
            else
            {
                echo "<li><a href = '#' >".$user["NOM"]."</li >";
                echo "<li><a href='index.php?action=disconnect' class='btn btn-danger'><i class='glyphicon glyphicon-log-out'></i>Decconexion </a></li> ";
            }
            ?>
        </ul>
    </div>
</nav>