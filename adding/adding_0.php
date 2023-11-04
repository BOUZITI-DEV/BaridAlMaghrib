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
            <div class='block'>
                <img src="../photos/barid_no_bg.png" alt="">
            </div>
            <div class='block'>
                <label for="">Table</label><br>
                <form action='adding_1.php' method='post'>
                    <select name="table">
                        <option value="machine">Machine</option>
                        <option value="responsable">Résponsable</option>
                        <option value="bureau">Bureau</option>
                        <option value="rattachement">Rattachement</option>
                        <option value="region">Région</option>
                        <option value="famille">Famille</option>
                        <option value="sous_famille">Sous famille</option>
                        <option value="marque">Marque</option>
                        <option value="modele">Modèle</option>
                    </select>
                <br><br><br>
                <input type="submit" value='valider' class='log'>
                </form>
            </div>
        </div>
        <?php
            include_once('../footer.php');
        ?>
    </body>
</html>