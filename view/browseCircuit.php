<html>
<head>
    <meta charset="UTF-8">
    <title>Projet Oracle</title>
    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <?php require_once("header.php") ?>
    <div class="container">
        <?php
        $voyages= select_circuits();
        foreach ($voyages as $voyage){
        $etapes = select_etapes($voyage["ID"]);
        
            echo "<div class=\"thumbnail\">";

        ?>

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width : 480px;margin: auto;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                for( $i =0; $i< sizeof($etapes);$i++){
                    if ($i==0) {
                        echo  '<li data-target="#myCarousel" data-slide-to="'. $i .'" class="active"></li>';
                    }else{
                        echo  '<li data-target="#myCarousel" data-slide-to="'. $i .'"></li>';
                    }

                }

                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $first =true;
                foreach ($etapes as $etape){

                if($first == true){
                    echo '<div class="item active">';
                    $first = false;
                }
                    else{
                        echo '<div class="item">';
                    }


                    echo '<img src="https://placeimg.com/640/480/any" alt="Los Angeles">';
                echo '<div class="carousel-caption">';
                    echo    '<h3>'.$etape["NOMLIEU"].'</h3>';
                    echo    '<p>'.$etape["DESCRIPTIF"].'</p>';
                    echo '</div>';
                echo '</div>';
                }
                ?>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
            <?php
            echo "<div class=\"caption\">";
            echo "<h3>".$voyage["VILLEDEPART"]."</h3>";
            echo "<span>".getRemainingPlaces($voyage["ID"])[0]." places disponibles sur ".$voyage["NBRPLACEDISPONIBLE"]."</span>";
            echo "<p>".$voyage["DESCRIPTIF"]."</p>";


            ?>

            <form action="index.php?action=insertReservation&view=browseCircuit" method="post">
                <input type="hidden" name="reservation_circuit" value="<?php echo $voyage["ID"]?>" >


                <p>
                    <?php

                    if(isCircuitReserved($user["ID"],$voyage["ID"])){
                        if(getRemainingPlaces($voyage["ID"])[0]>0) {
                            echo '<button type="submit" class="btn btn-default">Réserver</button>';
                        }
                        else{
                            echo '<button type="button" class="btn btn-danger">Complet</button>';
                        }
                    }
                    else{
                        echo '<button type="button" class="btn btn-success">merci</button>';
                    }
                    ?>

                </p>
            </form>
    </div>
    <?php
        }
        ?>
    </div>
</body>
</html>
