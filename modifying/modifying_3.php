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
                <form action="modifying_4.php" method="post">
                    <?php
                    include_once('../connexion_to_db.php');
                        $attribute = $_SESSION['attribute'];
                        $table = $_SESSION['table'];
                        if($table == 'role' || $table == 'region' || $table == 'rattachement' || $table == 'famille' || $table == 'modele' || $table == 'marque')
                        {
                            if($table == 'role')
                                $_SESSION['id_role'] = $_POST['id_role'];
                            elseif($table == 'region')
                                $_SESSION['id_region'] = $_POST['id_region'];
                            elseif($table == 'rattachement')
                                $_SESSION['id_rattachement'] = $_POST['id_rattachement'];
                            elseif($table == 'famille')
                                $_SESSION['id_famille'] = $_POST['id_famille'];
                            elseif($table == 'marque')
                                $_SESSION['id_marque'] = $_POST['id_marque'];
                            elseif($table == 'modele')
                                $_SESSION['id_modele'] = $_POST['id_modele'];
                            echo    "<label>Nouveau libellé</lable><br> 
                                    <input type='text' name='libelle' placeholder='nouveau libellé' required><br>";
                        }
                        elseif($_SESSION['table'] == 'sous_famille')
                        {
                            if($attribute == 'libelle_sous_famille')
                                echo        "<label>Sous famille</label><br> 
                                            <input type='text' name='libelle_sous_famille' placeholder='Sous famille' required><br>";
                            else
                            {
                                $_SESSION['id_sous_famille'] = $_POST['id_sous_famille'];
                                $query_famille =    "SELECT * 
                                                    FROM famille   
                                                    ORDER BY libelle_famille;";
                                $result_famille = mysqli_query($connexion, $query_famille);
                                echo    "<label>Nouvelle famille</label><br>
                                        <select name='id_famille'>";
                                        while($rows_famille = mysqli_fetch_assoc($result_famille))
                                        {
                                            $id_famille = $rows_famille['id_famille'];
                                            $libelle_famille = $rows_famille['libelle_famille'];
                                            echo "<option value='$id_famille'>$libelle_famille</option>";
                                        }
                                echo    "</select><br>";
                            }
                        }
                        elseif($_SESSION['table'] == 'bureau')
                        {
                            $_SESSION['id_bureau'] = $_POST['id_bureau'];
                            if($attribute == 'id_bureau')
                                echo    "<label>Nouveau code bureau</label><br>
                                        <input type='number' name='id_bureau_new' placeholder='code bureau' required><br>";
                            elseif($attribute == 'entite')
                                echo    "<label>Nouvelle entité</label><br>
                                        <input type='text' name='entite' placeholder='nouvelle entité' required><br>";
                            elseif($attribute == 'id_region')
                            {
                                $query_region = "SELECT * 
                                                FROM region 
                                                ORDER BY libelle_region;";
                                $result_region = mysqli_query($connexion, $query_region);
                                echo    "<label>Nouvelle region</label><br>
                                        <select name='id_region'>";
                                            while($rows_region = mysqli_fetch_assoc($result_region))
                                            {
                                                $id_region = $rows_region['id_region'];
                                                $libelle_region = $rows_region['libelle_region'];
                                                echo "region<option value='$id_region'>$libelle_region</option>";
                                            }    
                                echo    "</select><br>";
                            }
                            else
                            {
                                $query_rattachement =   "SELECT * 
                                                        FROM rattachement
                                                         ORDER BY libelle_rattachement;";
                                $result_rattachement = mysqli_query($connexion, $query_rattachement);
                                echo    "<label>Nouveau rattchement</label><br>
                                        <select name='id_rattachement'>";
                                            while($rows_rattachement = mysqli_fetch_assoc($result_rattachement))
                                            {
                                                $id_rattachement = $rows_rattachement['id_rattachement'];
                                                $libelle_rattachement = $rows_rattachement['libelle_rattachement'];
                                                echo "rattachement<option value='$id_rattachement'>$libelle_rattachement</option>";
                                            }
                                echo    "</select><br>";
                            }
                        }
                        elseif($_SESSION['table'] == 'responsable')
                        {
                            $_SESSION['matricule'] = $_POST['matricule'];
                           if($attribute == 'matricule')
                                echo    "<label>Nouveau matricule</label><br>
                                        <input type='number' name='matricule_new' placeholder='nouveau matricule' required><br>";
                           elseif($attribute == 'nom_prenom')
                                 echo    "<label>Nouveau nom et prenom</label><br>
                                        <input type='text' name='nom_prenom' placeholder='nouveau nom et prenom' required><br>";
                           elseif($attribute == 'id_role')
                           {
                                $query_role =   "SELECT * 
                                                FROM role 
                                                WHERE id_role != 1 
                                                ORDER BY libelle_role;";
                                $result_role = mysqli_query($connexion, $query_role);
                                echo    "<label>Nouveau rôle</label><br>
                                        <select name='id_role'>";
                                            while($rows_role = mysqli_fetch_assoc($result_role))
                                            {
                                                $id_role = $rows_role['id_role'];
                                                $libelle_role = $rows_role['libelle_role'];
                                                echo "<option value='$id_role'>$libelle_role</option>";
                                            }    
                                echo    "</select><br>";
                           }
                           else
                           {
                                $query_bureau = "SELECT * 
                                                FROM bureau 
                                                ORDER BY entite;";
                                $result_bureau = mysqli_query($connexion, $query_bureau);
                                echo    "<label>Nouvelle entité</label><br>
                                        <select name='id_bureau'>";
                                            while($rows_bureau = mysqli_fetch_assoc($result_bureau))
                                            {
                                                $id_bureau = $rows_bureau['id_bureau'];
                                                $entite = $rows_bureau['entite'];
                                                echo "<option value='$id_bureau'>$entite</option>";
                                            }
                                echo    "</select><br>";
                           }
                        }
                        elseif($_SESSION['table'] == 'machine')
                        {
                            $_SESSION['id_machine'] = $_POST['id_machine'];
                            if($attribute == 'num_serie')
                                echo    "<label>Nouveau numéro de série</label><br>
                                        <input type='text' name='num_serie' placeholder='nouveau numéro de série'><br>";
                            elseif($attribute == 'num_marche')
                                echo    "<label>Nouveau numéro de marché</label><br>
                                        <input type='text' name='num_marche' placeholder='nouveau de marché'><br>";
                            elseif($attribute == 'cab')
                                echo    "<label>Nouveau code à bar</label><br>
                                        <input type='text' name='cab' placeholder='nouveau code à bar'><br>";
                            elseif($attribute == 'position')
                                echo    "<label>Nouvelle position</label><br>
                                        <input type='text' name='position' placeholder='nouvelle position'><br>";
                            elseif($attribute == 'date_affectation')
                                echo    "<label>Nouvelle date d'affectation</label><br>
                                        <input type='date' name='date_affectation' placeholder='nouvelle date d'affectation'><br>";
                            elseif($attribute == 'etat')
                                echo    "<label>Nouveau état</label><br>
                                        <input type='text' name='etat' placeholder='nouveau état'><br>";
                            elseif($attribute == 'id_sous_famille')
                            {
                                $query_sous_famille =   "SELECT * 
                                                        FROM sous_famille 
                                                        ORDER BY libelle_sous_famille;";
                                $result_sous_famille = mysqli_query($connexion, $query_sous_famille);
                                echo    "<label>Nouvelle sous famille</label><br>
                                        <select name='id_sous_famille'>";
                                            while($rows_sous_famille = mysqli_fetch_assoc($result_sous_famille))
                                            {
                                                $id_sous_famille = $rows_sous_famille['id_sous_famille'];
                                                $libelle_sous_famille = $rows_sous_famille['libelle_sous_famille'];
                                                echo "<option value='$id_sous_famille'>$libelle_sous_famille</option>";
                                            }
                                echo    "</select><br>";
                            }
                            elseif($attribute == 'id_marque')
                            {
                                $query_marque = "SELECT * 
                                                FROM marque 
                                                ORDER BY libelle_marque;";
                                $result_marque = mysqli_query($connexion, $query_marque);
                                echo    "<label>Nouvelle marque</label><br> 
                                        <select name='id_marque'>";
                                            while($rows_marque = mysqli_fetch_assoc($result_marque))
                                            {
                                                $id_marque = $rows_marque['id_marque'];
                                                $libelle_marque = $rows_marque['libelle_marque'];
                                                echo "<option value='$id_marque'>$libelle_marque</option>";
                                            }    
                                echo    "</select><br>";
                            }
                            elseif($attribute == 'id_modele')
                            {
                                $query_modele = "SELECT * 
                                                FROM modele 
                                                ORDER BY libelle_modele;";
                                $result_modele = mysqli_query($connexion, $query_modele);
                                echo    "<label>Nouveau modele</label><br> 
                                        <select name='id_modele'>";
                                            while($rows_modele = mysqli_fetch_assoc($result_modele))
                                            {
                                                $id_modele = $rows_modele['id_modele'];
                                                $libelle_modele = $rows_modele['libelle_modele'];
                                                echo "<option value='$id_modele'>$libelle_modele</option>";
                                            }    
                                echo    "</select><br>";
                            }
                            else
                            {
                                $query_bureau = "SELECT * 
                                                FROM bureau 
                                                ORDER BY entite;";
                                $result_bureau = mysqli_query($connexion, $query_bureau);
                                echo    "<label>Nouvelle entité</label><br>
                                        <select name='id_bureau'>";
                                            while($rows_bureau = mysqli_fetch_assoc($result_bureau))
                                            {
                                                $id_bureau = $rows_bureau['id_bureau'];
                                                $entite = $rows_bureau['entite'];
                                                echo "<option value='$id_bureau'>$entite</option>";
                                            }
                                echo    "</select><br>";
                            }
                        }
                        echo    "<br><input type='submit' value='valider' class='log' id='log_1'>
                            </form>";
                    ?>
                </form>
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>