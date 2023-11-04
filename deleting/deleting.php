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
                <form action="" method='post'>
                    <label>Identifiant de la machine</label><br> 
                    <input type="number" name='id_machine' placeholder="id machine" required><br><br>
                    <br><input type="submit" value="Valider" class="log">
                </form>
                <?php
                    if(isset($_POST['id_machine']))
                    {
                        include_once('../connexion_to_db.php');
                        $id_machine = $_POST['id_machine'];
                        $query_machine =    "SELECT id_machine 
                                            FROM machine
                                            WHERE id_machine = $id_machine;";
                        $result_machine = mysqli_query($connexion, $query_machine);
                        if(mysqli_num_rows($result_machine) == 1)
                        {
                            $query_archive =    "INSERT INTO archive
                                                SELECT *
                                                FROM
                                                (
                                                    SELECT id_machine, libelle_region, libelle_rattachement, entite, machine.id_bureau, libelle_famille, libelle_sous_famille, libelle_marque, libelle_modele, num_serie, num_marche, cab, position, etat, date_affectation
                                                    FROM machine
                                                    INNER JOIN sous_famille ON machine.id_sous_famille = sous_famille.id_sous_famille
                                                    INNER JOIN famille ON sous_famille.id_famille = famille.id_famille
                                                    INNER JOIN modele ON machine.id_modele = modele.id_modele
                                                    INNER JOIN marque ON machine.id_marque = marque.id_marque
                                                    INNER JOIN bureau ON machine.id_bureau = bureau.id_bureau
                                                    INNER JOIN region ON bureau.id_region = region.id_region
                                                    INNER JOIN rattachement ON bureau.id_rattachement = rattachement.id_rattachement
                                                ) AS temp
                                                WHERE id_machine = $id_machine;";
                            $query_delete =    "DELETE FROM machine
                                                WHERE id_machine = $id_machine;";
                            $result_insert = mysqli_query($connexion, $query_archive);
                            if($result_insert)
                                $result = mysqli_query($connexion, $query_delete); 
                            else
                                $result = NULL;
                            if($result)
                                echo "<p id='green'>Supression reussi</p>";
                            else
                                echo "<p id='red'>echec de supression</p>";
                        }
                        else
                            echo "<p id='red'>machine introuvable</p>";
                    }
                ?>
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>