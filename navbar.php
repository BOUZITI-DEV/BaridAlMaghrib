<nav class='navbar'>
    <img src="../photos/user.png" id='user_logo' alt="">
    <?php
        session_start();
        $nom_prenom_login = $_SESSION['nom_prenom_login'];
        if($_SESSION['id_role_login'] != 1)
        {
            echo "<a class='name'>$nom_prenom_login : {$_SESSION['entite']}</a>";
            echo "<a href='../connexion/connexion.php' class='links'>Déconnexion</a>";
            echo "<a href='../connexion/changing_passwd_AL.php' class='links'>Changer mot de passe</a>";
        }
        else
        {
            echo "<a class='name' id='name_admin'>$nom_prenom_login</a>";
            echo "<a href='../connexion/connexion.php' class='links'>Déconnexion</a>";
            echo "<a href='../deleting/deleting.php' class='links'>Suppression</a>";
            echo "<a href='../modifying/modifying_0.php' class='links'>Modification</a>";
            echo "<a href='../adding/adding_0.php' class='links'>Ajout</a>";
            echo "<a href='../archive/archive.php' class='links'>Archive</a>";
            echo "<a href='../responsables/responsables.php' class='links'>Responsables</a>";
        }
        echo "<a href='../finding/finding.php' class='links'> Recherche</a>";
    ?>
</nav>
<br><br>