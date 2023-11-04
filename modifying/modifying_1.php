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
                <label for="">Champs à modifier</label><br>
                <form action='modifying_2.php' method='post'>
                    <select name="attribute" id="">
                        <?php
                        include_once('../connexion_to_db.php');
                        $table = $_POST['table'];
                        $_SESSION['table'] = $table;
                            if($table == 'role' || $table == 'rattachement' || $table == 'region' || $table == 'famille' || $table == 'modele' || $table == 'marque')
                            {
                                echo    "<option value='libelle'>$table</option>";
                            }
                            elseif($table == 'responsable')
                            {
                                echo    "<option value='matricule'>Matricule</option>
                                        <option value='nom_prenom'>Nom et prenom</option>
                                        <option value='id_role'>Rôle</option>
                                        <option value='id_bureau'>Entité</option>";
                            }
                            elseif($table == 'bureau')
                            {
                                echo    "<option value='id_bureau'>Code bureau</option>
                                        <option value='entite'>Entité</option>
                                        <option value='id_rattachement'>Rattachement</option>
                                        <option value='id_region'>Région</option>";
                            }
                            elseif($table == 'sous_famille')
                            {
                                echo    "<option value='libelle_sous_famille'>Sous famille</option>
                                        <option value='id_famille'>Famille</option>";
                            }
                            elseif($table == 'machine')
                            {
                                echo    "<option value='num_serie'>Numéro de série</option>
                                        <option value='num_marche'>Numéro de marché</option>
                                        <option value='cab'>Code à barres</option>
                                        <option value='position'>Position</option>
                                        <option value='date_affectation'>Date d'affectation</option>
                                        <option value='etat'>État</option>
                                        <option value='id_sous_famille'>Sous famille</option>
                                        <option value='id_marque'>Marque</option>
                                        <option value='id_modele'>Modèle</option>
                                        <option value='id_bureau'>Entité</option>";
                            }
                        ?>
                    </select><br>
                    <br><br>
                    <input type="submit" value='valider' class="log">
                </form>  
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>