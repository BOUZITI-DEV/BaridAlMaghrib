<?php  
$bdd = new PDO('mysql:host=localhost;dbname=parc_informatique;charset=utf8','root','');

$connect=mysqli_connect('localhost','root','','parc_informatique');

$output = '';
if(isset($_POST["export"]))
{
  $q=$_POST["entits"];
 $query = "SELECT * FROM `article` join sous_famille ON article.sous_famille=sous_famille.id  join model on article.model=model.id_mdl join locale on article.locale=locale.id_locale join responsable on article.resp =responsable.id_resp where entite='".$q."' ";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table border=1 class="table" bordered="1">  
                    <tr>  
                    <th>Responsable</th>
                    <th> Sous Famille</th>
                    <th>Modele</th>
                    <th >Num Serie</th>
                    <th >Num Marche</th>
                    <th >Code a barre</th>
                    <th >Date Inventaire</th>
                    <th>Operation</th>
                    <th>Locale</th   
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
      <td>'.$row['nom_prenom'].'</td>
      <td>'.$row['libelle'].'</td>
      <td>'.$row['libelle_model'].'</td>
      <td>'.$row['numero_serie'].'</td>
      <td>'.$row['numero_marche'].'</td>
      <td>'.$row['code_barre'].'</td>
      <td>'.$row['date_invention'].'</td>
      <td>'.$row['operation'].'</td>
      <td>'.$row['libelle_locale'].'</td>
                         
    </tr>
   ';
  }
  $output .= '</table>';
 header('Content-Type: application/xls');
 header('Content-Disposition: attachment; filename=Inventaire materiel informatique.xls');
  
 // header('Content-Type: application/pdf');
  // header('Content-Disposition: attachment; filename=download.pdf');
  
  
  echo $output;
 }
}
?>
