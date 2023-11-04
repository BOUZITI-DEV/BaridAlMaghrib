<html>
    <head>
        <link rel="stylesheet" href="../css/navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/form.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <?php
            include_once('../navbar.php');
        ?>
        <br>
        <div class="main_block">
            <div class="block">
                <img src="../photos/barid_no_bg.png" alt="">
            </div>
            <div class="block">
                <?php
                    include_once('../connexion_to_db.php');
                    $table = $_POST['table'];
                    $_SESSION['table'] = $table;
                    echo    "<form action='adding_2.php' method='post'>";
                    if($table == 'rattachement' || $table == 'region' || $table == 'famille' || $table == 'marque' || $table == 'modele')
                        echo    "<label>$table</label><br>
                                <input type='text' name='libelle' placeholder='$table' required><br>";
                    elseif($table == 'sous_famille')
                    {   
                        $query_famille =    "SELECT * 
                                            FROM famille 
                                            ORDER BY libelle_famille;";
                        $result_famille = mysqli_query($connexion, $query_famille);   
                        echo    "<label>Sous famille</label><br> 
                                <input type='text' name='libelle_sous_famille' placeholder='sous famille' required><br>
                                <label>Famille</label><br>
                                <select name='id_famille'>";
                                    while($rows_famille = mysqli_fetch_assoc($result_famille))
                                    {
                                        $id_famille = $rows_famille['id_famille'];
                                        $libelle_famille = $rows_famille['libelle_famille'];
                                        echo "<option value='$id_famille'>$libelle_famille</option>";
                                    }
                        echo    "</select>";
                    }
                    elseif($table == 'bureau')
                    {
                        $query_region =     "SELECT * 
                                            FROM region 
                                            ORDER BY libelle_region;";
                        $query_rattachement =   "SELECT * 
                                                FROM rattachement 
                                                ORDER BY libelle_rattachement;";
                        $result_region = mysqli_query($connexion, $query_region);
                        $result_rattachement = mysqli_query($connexion, $query_rattachement);
                        echo    "<label>Code bureau</label><br> 
                                <input type='number' name='id_bureau' placeholder='code bureau' required><br>
                                <label>Entité</lable><br> 
                                <input type='text' name='entite' placeholder='entité' required><br>
                                <label>Famille</lable><br>
                                <select name='id_region'>";
                                    while($rows_region = mysqli_fetch_assoc($result_region))
                                    {
                                        $id_region = $rows_region['id_region'];
                                        $libelle_region = $rows_region['libelle_region'];
                                        echo "<option value='$id_region'>$libelle_region</option>";
                                    }    
                        echo    "</select><br>";
                        echo    "<label>Rattachement</label><br>
                                <select name='id_rattachement'>";
                                    while($rows_rattachement = mysqli_fetch_assoc($result_rattachement))
                                    {
                                        $id_rattachement = $rows_rattachement['id_rattachement'];
                                        $libelle_rattachement = $rows_rattachement['libelle_rattachement'];
                                        echo "<option value='$id_rattachement'>$libelle_rattachement</option>";
                                    }
                        echo    "</select><br>";
                    }
                    elseif($table == 'responsable')
                    {
                        $query_role =   "SELECT * 
                                        FROM role
                                        WHERE id_role != 1
                                        ORDER BY libelle_role;";
                        $query_bureau = "SELECT * 
                                        FROM bureau 
                                        ORDER BY entite;";
                        $result_role = mysqli_query($connexion, $query_role);
                        $result_bureau = mysqli_query($connexion, $query_bureau);   
                        echo    "<label>Matricule</label><br>
                                <input type='number' name='matricule' placeholder='matricule' required><br>
                                <label>Nom et prenom</label><br> 
                                <input type='text' name='nom_prenom' placeholder='nom et prenom' required><br>
                                <label>Rôle</label><br>
                                <select name='id_role'>";
                                    while($rows_role = mysqli_fetch_assoc($result_role))
                                    {
                                        $id_role = $rows_role['id_role'];
                                        $libelle_role = $rows_role['libelle_role'];
                                        echo "<option value='$id_role'>$libelle_role</option>";
                                    }    
                        echo    "</select><br>";
                                    
                        echo    "<label>Bureau</label><br>
                                <select name='id_bureau'>";
                                    while($rows_bureau = mysqli_fetch_assoc($result_bureau))
                                    {
                                        $id_bureau = $rows_bureau['id_bureau'];
                                        $entite = $rows_bureau['entite'];
                                        echo "<option value='$id_bureau'>$entite</option>";
                                    }
                        echo    "</select><br>";
                    }
                    elseif($table == 'machine')
                    {
                        $query_sous_famille =   "SELECT * 
                                                FROM sous_famille 
                                                ORDER BY libelle_sous_famille;";
                        $query_marque = "SELECT * 
                                        FROM marque
                                         ORDER BY libelle_marque;";
                        $query_modele = "SELECT * 
                                        FROM modele 
                                        ORDER BY libelle_modele;";
                        $query_bureau = "SELECT * 
                                        FROM bureau 
                                        ORDER BY entite;";
                        $result_sous_famille = mysqli_query($connexion, $query_sous_famille);
                        $result_marque = mysqli_query($connexion, $query_marque);
                        $result_modele = mysqli_query($connexion, $query_modele);
                        $result_bureau = mysqli_query($connexion, $query_bureau);
                        echo    "<label>Numéro de série</label><br> 
                                <input type='text' name='num_serie' placeholder='numéro de série'><br>
                                <label>Numéro de marché</label><br> 
                                <input type='text' name='num_marche' placeholder='numéro de marché'><br>
                                <label>Code à barres</label><br>  
                                <input type='text' name='cab' placeholder='code à barres'><br>
                                <label>Position</label><br> 
                                <input type='text' name='position' placeholder='position'><br>
                                <label>Date d'affectation</label><br> 
                                <input type='date' name='date_affectation' placeholder='date d'affectation'><br>
                                <label>État</label><br> 
                                <input type='text' name='etat' placeholder='état'><br>
                                <label>Sous famille</label><br>
                                <select name='id_sous_famille'>";
                                    while($rows_sous_famille = mysqli_fetch_assoc($result_sous_famille))
                                    {
                                        $id_sous_famille = $rows_sous_famille['id_sous_famille'];
                                        $libelle_sous_famille = $rows_sous_famille['libelle_sous_famille'];
                                        echo "<option value='$id_sous_famille'>$libelle_sous_famille</option>";
                                    }
                        echo    "</select><br>";
                        echo    "<label>Marque</label><br> 
                                <select name='id_marque'>";
                                while($rows_marque = mysqli_fetch_assoc($result_marque))
                                {
                                    $id_marque = $rows_marque['id_marque'];
                                    $libelle_marque = $rows_marque['libelle_marque'];
                                    echo "<option value='$id_marque'>$libelle_marque</option>";
                                }    
                        echo    "</select><br>";
                        echo    "<label>Modèle</label><br> 
                                <select name='id_modele'>";
                                    while($rows_modele = mysqli_fetch_assoc($result_modele))
                                    {
                                        $id_modele = $rows_modele['id_modele'];
                                        $libelle_modele = $rows_modele['libelle_modele'];
                                        echo "<option value='$id_modele'>$libelle_modele</option>";
                                    }    
                        echo    "</select><br>";
                        echo    "<label>Bureau</label><br> 
                                <select name='id_bureau'>";
                                    while($rows_bureau = mysqli_fetch_assoc($result_bureau))
                                    {
                                        $id_bureau = $rows_bureau['id_bureau'];
                                        $entite = $rows_bureau['entite'];
                                        echo "<option value='$id_bureau'>$entite</option>";
                                    }
                        echo    "</select><br>";
                    } 
                    echo    "<br><br><input type='submit' value='Valider' class='log'>
                            </form>";  
                ?> 
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>