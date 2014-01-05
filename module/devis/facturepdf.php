<?php
include ("../../config/config.php");
$idfacture = $_REQUEST['idfacture'];

$sql = "SELECT 
		d.id iddevis , 	d.numerodevis numerodevis , 	d.pax pax , 	d.paxcalcul paxcalcul , 	d.debut debut , 	d.fin fin ,  	d.cgv cgv , 	d.commentaire commentaire ,  	d.coutderevien coutderevien , 	d.prixdevente prixdevente , 	 	
		
		 a.nom nomaffaire , a.numero numeroaffaire , 	
		
		t.id idtypelignefacture, t.typelignefacture typelignefacture , f.montant montant , f.numerofacture numerofacture , f.datecrea datecrea , f.payele payele ,
		
		c.nom nomclient , c.telbureau telbureau , c.telmobile telmobile , c.teldiv teldiv , c.fax fax , c.secondmail secondmail , c.origine origine ,  c.adresse adresse , c.ville ville , c.codepostal codepostal , c.pays pays ,
		
		s.societe societe, s.ext ext
		
		
		FROM `devis` d
		INNER JOIN affaire a ON d.`idaffaire` = a.id
		INNER JOIN societe s ON s.`id` = a.societe
		INNER JOIN lignefacture f ON d.`id` = f.iddevis
		INNER JOIN typelignefacture t ON t.`id` = f.typelignefacture
		LEFT JOIN client c ON a.client = c.id
		WHERE f.id = $idfacture
		LIMIT 1



";

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
$iddevis = $data['iddevis'];
$numerodevis = $data['numerodevis'];

$paxcalcul = $data['paxcalcul'];
$debut = $data['debut'];
$fin = $data['fin'];
$cgv = $data['cgv'];
$commentaire = $data['commentaire'];
$coutderevien = $data['coutderevien'];
$prixdevente = $data['prixdevente'];
$nomaffaire = $data['nomaffaire'];
$numeroaffaire = $data['numeroaffaire'];
$typelignefacture = $data['typelignefacture'];
$idtypelignefacture = $data['idtypelignefacture'];
$montant = $data['montant'];
$numerofacture = $data['numerofacture'];
$datecrea = $data['datecrea'];
$payele = $data['payele'];
$nomclient = $data['nomclient'];
$telbureau = $data['telbureau'];
$telmobile = $data['telmobile'];
$teldiv = $data['teldiv'];
$fax = $data['fax'];
$secondmail = $data['secondmail'];
$origine = $data['origine'];
$adresse = $data['adresse'];
$ville = $data['ville'];
$codepostal = $data['codepostal'];
$pays = $data['pays'];
$ext = $data['ext'];

$datecrea = explode(" ", $datecrea);
$datecrea = explode("-", $datecrea[0]);
$datecrea = $datecrea[2]."/".$datecrea[1]."/".$datecrea[0];


$payele = explode("-", $payele);
$payele = $payele[2]."/".$payele[1]."/".$payele[0];

$debut = explode("-", $debut);
$debut = $debut[2]."/".$debut[1]."/".$debut[0];

$fin = explode("-", $fin);
$fin = $fin[2]."/".$fin[1]."/".$fin[0];



}

$sql = "SELECT  l.id id,  	l.montant montant, 	l.numerofacture numerofacture,  	l.payele payele,
	
 l.typelignefacture idtypelignefacture, t.typelignefacture typelignefacture
 
 

 
FROM `lignefacture` l
LEFT JOIN typelignefacture t ON l.typelignefacture = t.id
WHERE l.`iddevis` = $iddevis
AND l.numerofacture < $numerofacture
";
	
	$therowC = "";
	
	
	
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	while($data = mysql_fetch_assoc($req)) {
		
		$i = $data['id'];
		
		$data['payele'] = explode("-", $data['payele']);
		$data['payele'] = $data['payele'][2]."/".$data['payele'][1]."/".$data['payele'][0];
		
		
		if($data['idtypelignefacture'] == 2){
		
		$calcultotal = $calcultotal - $data['montant'];
			
		$montantafl = "- ".$data['montant'];
		
		
		}else{
			$calcultotal = $calcultotal + $data['montant'];
			
			$montantafl = $data['montant'];
		}
				
				
		
		$therowC .= "
	
	      <tr bgcolor=\"white\"> 
          <td >".$extsociete."f".$data['numerofacture']."</td>
          <td >".$data['typelignefacture']."</td>
          <td >".$montantafl."</td>
          <td >".$data['payele']."</td>
          
          
          </tr>
		
		
	
	
	
	
	";
	
	
	
		
	}
	
	if($idtypelignefacture == 2){
		
		$calcultotal = $calcultotal - $montant;	
		$montantaf = "- ".$montant;
		
	}else{
			
			$calcultotal = $calcultotal + $montant;
			$montantaf = $montant;
		
	}
	
$resteapayer = $prixdevente - $calcultotal;
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
	
    ob_start();
	
    ?>
   
<style>
body{
	
margin:0;
padding:0;
font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;

}
</style>


<page style="font-size: 14px">
<table style="width:100%">
  <tr style="width:100%">
    <td><table style="width:100%">
        <tr style="width:100%">
          <td style="width:50%"><table style="width:300px" >
              <tr style="width:100%">
                <td style="width:50%" ><img width="150px" src="../../img/logo_PR.png"/></td>
              
                <td style="text-align:center; width:50%;">33 rue de la Balance<br/>
                  84000 Avignon<br/>
                  04 90 14 70 00<br>
                </td>
              </tr>
            </table></td>
          <td style="width:50%"></td>
        </tr>
        <tr style="height:120px;">
          <td><table>
              <tr >
                <td><b><?php echo $typelignefacture; ?> :</b> <?php echo $ext."f".$numerofacture; ?></td>
              </tr>
              <tr>
                <td>Avignon le <?php echo $datecrea; ?></td>
              </tr>
            </table></td>
          <td><table style="text-align:center; width:100%">
              <tr >
                <td><b><?php echo $nomclient; ?></b></td>
              </tr>
              <tr>
                <td><span style="text-align:center;"><?php echo $adresse; ?><br/>
<?php echo $codepostal; ?> <?php echo $ville; ?> <?php echo $pay; ?><br/>
<?php echo $telbureau; ?></span></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><p>&nbsp;</p>
      <p><b>Nom de l'affaire :</b> <?php echo $nomaffaire; ?><br/>
        <b>Dossier N° :</b> <?php echo $numeroaffaire; ?><br/>
        <b>Date du sejour :</b> du <?php echo $debut; ?> au <?php echo $fin; ?><br/>
        <b>Nombre de personne :</b> <?php echo $paxcalcul; ?><br/>
        <b>Prix de l'affaire :</b> <?php echo $prixdevente; ?> €<br/>
        <b>Prix par personne :</b> <?php echo $prixdevente/$paxcalcul; ?> €<br/>
        <b>Commentaire :</b> <br>
      <?php echo $commentaire; ?> </p>
      <p><br/>
    </p></td>
  </tr>
  <tr>
    <td>Facturé : </td>
  </tr>
  <tr style="width:100%;">
    <td style="width:100%;"><table  style="width:100%; border:solid 1mm #000000">
        <tr>
          <td style="width:25%;"><b>Numéro</b></td>
          <td style="width:25%;"><b>Type</b></td>
          <td style="width:25%;"><b>Montant</b></td>
          <td style="width:25%;"><b>Payé le</b></td>
        </tr>
        <?php echo $therowC; ?>
      </table></td>
  </tr>
  <tr><td><br/></td></tr>
  <tr>
    <td><table style="width:95%;">
    	 
        <tr>
        	<td style="width:60%"> </td>
          <td  style="text-align:right; width:20%; "><b>Prix Net</b></td>
          <td style="text-align:center; width:20%; border:solid 1mm #000000;"><?php echo $montantaf; ?> €</td>
        </tr>
        <tr>
        	<td style="width:60%"> </td>
          <td style="text-align:right; width:20%; "><b>Payé le</b></td>
          <td style="text-align:center; width:20%; border:solid 1mm #000000;"><?php echo $payele; ?></td>
        </tr>
        <tr>
        <td style="width:60%"> </td>
          <td style="text-align:right; width:20%; "><b>Resta a payer</b></td>
          <td style="text-align:center; width:20%; border:solid 1mm #000000;"><?php echo $resteapayer; ?> €</td>
        </tr>
      </table></td>
  </tr>
  <tr><td>
  <?php echo $cgv; ?>
  </td></tr>
</table>
</page> 
    <?php
	
    $content = ob_get_clean();

    // convert in PDF
    require_once(dirname(__FILE__).'/../../class/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('exemple00.pdf');

    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
	
