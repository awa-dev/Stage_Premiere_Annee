<?php
    require_once "fonction.php";
    /** print_r($postepouvoirs);*/ 
    $qualifs = AfficheQualif();
    $libels = postePouvoir();
    // barre de recherche
    if (isset($_REQUEST['recher'] ) && $_REQUEST['recher']  == "Recherche"){
        $libelle =$_REQUEST['libel'];
        $qualification = $_REQUEST['qualif'];
        $etat = $_REQUEST['etat'];
        $dateDeb = $_REQUEST['dateDeb'];
        $dateFin = $_REQUEST['dateFin'];
        $dateDu = $_REQUEST['dateDeb'];
       

        if (empty($libelle)){
            $libelle="*";
        }

        if (empty($qualification)){
            $qualification="*";
        }

        if (empty($etat)){
            $etat="*";
        }

        if (empty($dateDeb)){
            $dateDeb="*";
            
        }

        if (empty($dateFin)){
            $dateFin="*";
        }
       
        if (empty($dateDu)){
            $dateDu="*";
        }
   
        
        if ($dateDeb != "*"){
            $dateDeb= DateConvertiseurFrancaisAnglais($dateDeb);
        }
   
        if($dateFin != "*"){
            $dateFin= DateConvertiseurFrancaisAnglais($dateFin);
        }

         if($dateDu != "*"){
            $dateDu= DateConvertiseurFrancaisAnglais($dateDu);
        }

        $postepouvoirs =  RecherchePouvoir($libelle, $qualification, $etat, $dateDeb, $dateFin, $dateDu);
        // print_r($postePouvoirs);

    ?>
        
    <?php       
    }

    else{
        $postepouvoirs =  AffichePostePouvoir();
    }
if(isset($libelle)){
    if($libelle == "*" && $qualification == "*" && $etat == "*" && $dateDeb == "*" && $dateFin == "*" && $dateDu == "*"){
        $postepouvoirs =  AffichePostePouvoir();
    }
}


    
    
   
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

    <script type="text/javascript">
        // Initialisation JQUERY
        $(document).ready(function() {
        // dateTraitement = '';
        // Site Boostrap datePicker 
        // https://bootstrap-datepicker.readthedocs.io/en/latest/options.html

            $('.periode').datepicker({
            maxViewMode: 2,
            language: "fr",
            orientation: "bottom left",
            //daysOfWeekDisabled: "0",
            calendarWeeks: true,
            todayHighlight:true,
            autoclose:true
            });
            
        });
    </script>
 
    <body>
        <style>
            @page { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
            body { margin-left: 0.39370078740157in; margin-right: 0.39370078740157in; margin-top: 0.31496062992126in; margin-bottom: 0.23622047244094in; }
            table, th, .head { border: 1px solid black; margin-bottom:2em}
            h1{text-align: center;}
            img { width: 10em;}
            .header { width : 100%; margin-bottom: 2em; }
            .header, .rech{ border: none; }
            .tab2{ border: none; }
            .header td{width : 33%; }
            th{text-align:center;}
            tr td{text-align:center;}
            .rech input , select {width: 150px;}
        </style>
        <center>
                <table class="header">
                    <tr>
                        <td ><img src="img/logo.png"></td> 
                        <td ><h2>Suivi poste à pourvoir</h2></td>
                        <td ></td>
                    </tr>
                </table>
                <!-- barre de recherche -->
                <table class="rech">
                    <form action="pouvoir.php">
                        <tr>
                            <td >
                                Libellé : 
                            </td>
                            <td>
                                <!-- <input name="libel" type="texte" placeholder="Libellé emploi…"> -->
                                <select name="libel" id="libel">
                                    <option value=""></option>
                                    <?php foreach($libels as $libel){ ?>
                                        <option value="<?php echo $libel->Libelle_Emploi; ?>"><?php echo $libel->Libelle_Emploi; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td style="padding-left:2em;">
                                Niveau de qualification : 
                            </td>
                            <td >
                                <!-- <input name="qualif" type="texte" placeholder="Niveau qualification…" > -->
                                <select name="qualif" id="qualif">
                                <option value=""></option>
                                <?php foreach($qualifs as $qualif){ ?>
                                    <option value="<?php echo $qualif->Niveau_Qualification; ?>"><?php echo $qualif->Niveau_Qualification; ?></option>
                                <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="" >Date de création : </td>
                            <td>
                                <input class="periode" name="dateDeb" type="date" placeholder="Du…">
                                <input class="periode" name="dateFin" type="date" placeholder="Au…">
                            </td>
                            <td colspan="">Etat : </td>
                            <td >
                                <!-- <input name="etat" type="texte" placeholder="etat de création…"> -->
                                <select name="etat" id="etat">
                                <option value=""></option>
                                    <option value="En cours">En cours</option>
                                    <option value="Affecté">Affecté</option>
                                    <option value="Abandonné">Abandonné</option>
                                
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=8>
                                <input type="submit" name="recher" id="recher"  value="Recherche" style="margin-top:1.5em;" />
                            </td>
                        </tr>
                    </form>
                </table>
             
                
                <table>
                    <thead >
                        <tr>
                            <th scope="col"rowspan="2">Date de création</th>
                            <th scope="col"rowspan="2">Libellé Emploi</th>
                            <th scope="col"rowspan="2">Niveau de qualification</th>
                            <th scope="col"rowspan="2">Profil recherché</th>
                            <th scope="col"rowspan="2">Service concerné</th>
                            <th scope="col" colspan="3">Nombres d'entretiens</th>
                            <th scope="col"rowspan="2">Ref. expression besoin</th>
                            <th scope="col"rowspan="2">Candidat retenu</th>
                            <th scope="col"rowspan="2">Motif poste</th>
                            <th scope="col"rowspan="2">Etat</th>
                            <th scope="col"rowspan="2">Date de modification</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th>Telephone</th>
                            <th>Cadre</th>
                            <th>Direction</th>
                        </tr>
                    </thead> 
                    <!-- je fais appèle à la fonction PostePouvoir afin d'afficher les éléments de la base de données qui ont un etat "en cours" dans le tableau-->
                    
                    <form action="pouvoir.php" method="GET">
                        <?php foreach ($postepouvoirs as $postepouvoir) :?>
                            <tr>
                                <input type="hidden" name="id" value="<?php echo $postepouvoir->id; ?>">
                                <td class="head"> <?php  {echo DateConvertiseurAnglaisFrancais($postepouvoir->Date_Creation);} ?> </td>
                               
                                <td class="head"> <?php echo $postepouvoir->Libelle_Emploi; ?> </td>
                                <td class="head"> <?php echo $postepouvoir->Niveau_Qualification; ?> </td>
                                <td class="head"> <?php echo $postepouvoir->Profil_Recherche; ?> </td>
                                <td class="head"> <?php echo $postepouvoir->Service; ?> </td>

                                <!-- le nombre de type dentretien telephonique effectier pour un poste -->
                                <?php $telephones= telephone($postepouvoir->id); ?>
                                <?php foreach ($telephones as $telephone) :?>
                                    <td class="head"><?php echo $telephone->nbTelephone ?></td>
                                <?php endforeach; ?>  

                                 <!-- le nombre de type dentretien cadre effectier pour un poste -->
                                 <?php $cadres= cadre($postepouvoir->id); ?>
                                 <?php foreach ($cadres as $cadre) :?>
                                    <td class="head"><?php echo $cadre->nbCadre; ?></td>
                                <?php endforeach; ?>

                                
                                 <!-- le nombre de type dentretien direction effectier pour un poste -->
                                 <?php $directions = direction($postepouvoir->id); ?>
                                 <?php foreach ($directions as $direction) :?>          
                                    <td class="head"><?php echo $direction->nbDirection; ?></td>
                                 <?php endforeach; ?> 
                         
                                <td class="head"> <?php echo $postepouvoir->Expression_besoin; ?> </td>
                                <td class="head"> <?php echo $postepouvoir->Candidat_Retenu; ?> </td>
                                <td class="head"> <?php echo $postepouvoir->Motif_Poste; ?> </td>
                                <td class="head"> <?php echo $postepouvoir->Etat; ?> </td>
                                <td class="head"> <?php {echo DateConvertiseurAnglaisFrancais($postepouvoir->Date_Modification);} ?> </td>
                                
                               
                                <!--<td><input type="submit" name="chk" value="modification"></td> -->
                                <td><input type="radio" name="radio" value="<?php echo $postepouvoir->id; ?>"></td> 
                               
                            </tr>
                        <?php endforeach; ?>

                         <!-- les boutons d'accès -->
                        <table class="tab2">
                            <tr>
                                <td> <input type="button" onclick="window.location.href = 'creation_pouvoir.php';" value="Création"/></td>
                                <td><input type="submit" name="mod" value="Modification"></td>
                                <td><input type="submit" name="entr" value="Entretien"/></td>
                                <td> <input type="button" onclick="window.location.href = 'index.php';" value="Menu principale"/></td>
                                
                               
                            </tr>
                        </table>
                    </form>

                    <!-- boutton modification -->  
                    <?php
                        if ($_REQUEST['mod']=="Modification" and $_REQUEST['radio'] != 0) :
                            $id = $_REQUEST['radio'];
                            ?><meta http-equiv="refresh" content="0;url=modif_pouvoir.php?id=<?php echo("$id") ?>">
                         <?php endif;
                    ?>



                       <!-- boutton entretien -->  
                       <?php 
                        if ($_REQUEST['entr']=="Entretien" and $_REQUEST['radio'] != 0) :
                            $id = $_REQUEST['radio'];
                            ?><meta http-equiv="refresh" content="0;url=entretien_pouvoir.php?id=<?php echo("$id") ?>">
                         <?php endif;
                    ?>

                  

                </table>

                
        </center>
        
    </body>



</html>


