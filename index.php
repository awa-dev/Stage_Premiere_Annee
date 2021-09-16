<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 0);

//include('Includes/globals.php');

/* On recupère les infos du user connecté

$service->getUser();
$service->getCleAgent($service->nomPrenom);
 
if (!isset($service->idUser) || $service->idUser==0 ) {
    echo "<script>top.window.location = '/index.php/component/users/?view=login'</script>";
}

*/

?>


<!DOCTYPE html>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker3.css">
      <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.css">
      <script type="text/javascript" language="javascript" src="bootstrap-4.4.1/js/jquery-3.4.1.js"></script>  
      <script src="bootstrap-4.4.1/js/bootstrap.min.js" ></script>
      <script src="bootstrap-4.4.1/js/bootstrap-datepicker.js"></script>
      <script src="bootstrap-4.4.1/js/bootstrap-datepicker.fr.min.js"></script>
	  <link rel="stylesheet" href="css/style.css">
  </head>
  
<body>
  <style>
    @page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
    h1{text-align: center;}
    img { width: 10em;}
    #header { width : 100%; margin-bottom: 2em; }
    #header { border: none; }
    #header td{width : 33%; }
    a{ margin: 100px 15px 0 0;}
  </style>
  <center>
        <table id="header">
            <tr >
                <td><img src="img/logo.png"></td> <!-- logo du CTI de Melun -->
                    <td><h1> MOSAIC 2.0</h1></td>
                    <td></td>
            </tr>
        </table>

        <table>
                <!-- Insersion des différents logos -->
            <div id="logo">
                <tr>
                    <td >
                        <a href="pouvoir.php"><img class="Menu" src="img/creation.png" height="100" width="100" /> </a><br />
                        Suivi poste à pourvoir
                    </td>
                    <td >
                        <a href="entretien.php"><img class="Menu" src="img/creation.png" height="100" width="100" /></a><br />
                        Entretien
                    </td>
                    <td >
                        <a href="suiviP2I.php?id=1&num=1"><img class="Menu" src="img/Liste.png" width="100" height="100" /></a><br />
                        P2I
                    </td>
                </tr>

                <tr >
                    
                    <td >
                        <a href="suiviPAI.php"><img class="Menu" src="img/creation.png" height="100" width="100" /></a><br />
                        PAI
                    </td>
                    <td>
                        <a href="#statistique.php"><img class="Menu" src="img/statistiques.png" height="100" width="100" /></a><br />
                        Statistique
                    </td>
                    <td>
                        <a href="selectCanevas.php?id=1&num=1"><img class="Menu" src="img/Liste.png" width="100" height="100" /></a><br />
                        Canevas de P2I ET PAI
                    </td>
                </tr>

          </div>
        </table>
    </center>

  </body>
</html>


