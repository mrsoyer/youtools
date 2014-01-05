<?php
include('class/pagination.php');
include('class/filtre.php');

$new = $chemin.$wintype.".php?page=insert&cat=".$cat."&relatifa=".$relatifa."&idrelation=".$idrelation."&vpb=".$vpb;

//----------------------- traitement de la recherche	-----------------------


$laselection = "
a.id id".$cat.", 	a.nom client, 	a. codecompta codecompta, 	a.telbureau telbureau, a.telmobile telmobile, a.teldiv teldiv, a.fax fax, a.secondmail secondmail, a.ville ville, a.codepostal codepostal, a.pays pays, a.adresse adresse, 	

o.origine origine, o.id idorigine, 	

c.id idcontact, c.nom nomcontact,c.prenom prenomcontact,c.civilite civilitecontact,c.email emailcontact,c.telbureau telbureaucontact,c.telmobile telmobilecontact,c.teldiv teldivcontact,c.fax faxcontact,c.secondmail secondmail,c.adresse adressecontact,c.ville villecontact,c.codepostal codepostalcontact,c.pays payscontact,

u.pseudo assigne, u.id 	idassigne
";

$larecherche = "FROM `client` a
				LEFT JOIN origine o  ON o.id = a.origine
				LEFT JOIN contact c ON c.id = a.contactlie
				LEFT JOIN user u ON u.id = a.assigne";
					
					
$recherche[0]['nom'] = 'codecompta';
$recherche[0]['type'] = 'shclassic';
$recherche[0]['where'][0] = 'a.codecompta';
$recherche[0]['orderby'] = 'a.codecompta';

$recherche[1]['nom'] = 'client';
$recherche[1]['type'] = 'shclassic';
$recherche[1]['where'][0] = 'a.nom';
$recherche[1]['orderby'] = 'a.nom';
$recherche[1]['link'] = "page=insert&cat=".$cat."&id".$cat."=";


$recherche[2]['nom'] = 'contact';
$recherche[2]['type'] = 'shpopidnom';
$recherche[2]['where'][0] = 'c.id';
$recherche[2]['where'][1] = 'c.nom';
$recherche[2]['orderby'] = 'c.nom';
$recherche[2]['link'] = "page=insert&cat=contact&idcontact=";

$recherche[3]['nom'] = 'ville';
$recherche[3]['type'] = 'shclassic';
$recherche[3]['where'][0] = 'a.ville';
$recherche[3]['orderby'] = 'a.ville';

$recherche[4]['nom'] = 'codepostal';
$recherche[4]['type'] = 'shclassic';
$recherche[4]['where'][0] = 'a.codepostal';
$recherche[4]['orderby'] = 'a.codepostal';

$recherche[5]['nom'] = 'pays';
$recherche[5]['type'] = 'shclassic';
$recherche[5]['where'][0] = 'a.pays';
$recherche[5]['orderby'] = 'a.pays';



$recherche[6]['nom'] = 'assigne';
$recherche[6]['type'] = 'shselectbox';
$recherche[6]['where'][0] = 'a.assigne';
$recherche[6]['where'][1] = 'user';
$recherche[6]['where'][2] = 'pseudo';
$recherche[6]['orderby'] = 'u.`pseudo`';

	


$where = where($cat, $recherche);
$filtre = filtre($cat, $recherche,$vpbup);
$ordre = ordre($cat, $recherche);
$orderby = order($cat, $recherche);
$lefiltre = lefiltre($cat, $recherche,$chemin,$wintype,$vpb);


// -----------------------fin traitement de la recherche	-----------------------

$numerotation = "SELECT   COUNT(*) $larecherche $where ";
		
		
	$req = mysql_query($numerotation) or die('Erreur SQL !<br>'.$numerotation.'<br>'.mysql_error());
	 $row = mysql_fetch_row($req);
    $total = $row[0];
		

    // Libération de la mémoire associée au résultat
    mysql_free_result($req);
 
    $epp = 50; // nombre d'entrées à afficher par page (entries per page)
    $nbPages = ceil($total/$epp); // calcul du nombre de pages $nbPages (on arrondit à l'entier supérieur avec la fonction ceil())
 
    // Récupération du numéro de la page courante depuis l'URL avec la méthode GET
    // S'il s'agit d'un nombre on traite, sinon on garde la valeur par défaut : 1
    $current = 1;
    if (isset($_GET['p'.$cat]) && is_numeric($_GET['p'.$cat])) {
        $page = intval($_GET['p'.$cat]);
        if ($page >= 1 && $page <= $nbPages) {
            // cas normal
            $current=$page;
        } else if ($page < 1) {
            // cas où le numéro de page est inférieure 1 : on affecte 1 à la page courante
            $current=1;
        } else {
            //cas où le numéro de page est supérieur au nombre total de pages : on affecte le numéro de la dernière page à la page courante
            $current = $nbPages;
        }
    }
 
    // $start est la valeur de départ du LIMIT dans notre requête SQL (dépend de la page courante)
    $start = ($current * $epp - $epp);
	
	$urlcurrentmoinp = str_replace("&p".$cat."=".$_REQUEST['p'.$cat],"",$url);
	
	$paginate = paginate($urlcurrentmoinp, '&p".$cat."=', $nbPages, $current);	

$getjs = "";	
if($wintype=="popup"){
	
	if(isset($_REQUEST['js'])) {
		
		$getjs = "&js=".$_REQUEST['js'];
	
		$sqlpopupaction = "SELECT  * FROM js WHERE js = '".$_REQUEST['js']."' LIMIT 1 ";
		$req = mysql_query($sqlpopupaction) or die('Erreur SQL !<br>'.$sqlpopupaction.'<br>'.mysql_error());
	
		while($data = mysql_fetch_assoc($req)) {
			
			$js = $data['script'];
			
		}
	
	}
	
	
}

$sqlliste = "SELECT  $laselection $larecherche $where $orderby LIMIT $start, $epp ";
$req = mysql_query($sqlliste) or die('Erreur SQL !<br>'.$sqlliste.'<br>'.mysql_error());
$laliste .= "";

	while($data = mysql_fetch_assoc($req)) {
		
	
		
		
		
		
			 if($wintype=="popup"){
			 /*window.opener.document.formulairecontact.sh_relatif_tache.value=document.formulairecontact_".$cat.".text".$data['id'.$cat].".value;
			
				self.close();*/
				
			  $selectpopup = "
			  <td>
			  <script type='text/javascript'>
				function validepopupform".$data['id'.$cat]."(){
				
				".str_replace("[id".$cat."]",$data['id'.$cat],$js)."
			
				}
				</script>
			  
			  <input type='hidden' value='".$data['id'.$cat]."' id='text".$data['id'.$cat]."' name='text".$data['id'.$cat]."' />

			<input type='hidden' value='".$data[$cat]."' id='nomtext".$data['id'.$cat]."' name='nomtext".$data['id'.$cat]."' />
<input type='button' class=\"crmbutton small save\" value='go' onclick='validepopupform".$data['id'.$cat]."()' />

</td>";
			 
		 }else{
			 
			 $selectpopup = "";
			 
			 
		 }
		 
		 $affichlist = "";

		foreach($recherche as $key => $value){
			
			
				if($value['link'] != ""){
					
					if($addtype == "shared"){
	
						if($wintype == "index"){
							
							$affichlist .=	 "<td><a onclick=\"popup_shared_insert".$value['nom'].$data['id'.$value['nom']]."()\" >".$data[$value['nom']]."</a></td>";
							
							$affichlist .= "
							<script>
							function popup_shared_insert".$value['nom'].$data['id'.$value['nom']]."(){ var popy= window.open('".$chemin."popup.php?".$value['link'].$data['id'.$value['nom']].$getjs."&vpb=".$vpbup."','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 
							</script>";
							
							
							
						}else{
							$affichlist .=	 "<td>".$data[$value['nom']]."</td>";
							
						}
						
					}else{
						
					$affichlist .=	 "<td><a href = \"".$chemin.$wintype.".php?".$value['link'].$data['id'.$value['nom']].$getjs."&vpb=".$vpb."\" >".$data[$value['nom']]."</a></td>";
					
					
						
					}
					
					
					
					
				}else{
					
					$affichlist .=	 "<td>".$data[$value['nom']]."</td>";	
				
				}
						
			
	
		}
		
		if($addtype == "shared"){
	
			if($wintype == "index"){
				
				
				
				$editer =	 "<a onclick=\"popup_shared_insert".$cat.$data['id'.$cat]."()\" >éditer</a> | ";
				
				$editer .= "
				<script>
				function popup_shared_insert".$cat.$data['id'.$cat]."(){ var popy= window.open('".$chemin."popup.php?page=insert&cat=".$cat."&id".$cat."=".$data['id'.$cat].$getjs."&vpb=".$vpbup."','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 
				</script>";
				
				
				
			}
			
		}else{
			
		$editer =	 "<a href = \"".$chemin.$wintype.".php?page=insert&cat=".$cat."&id".$cat."=".$data['id'.$cat].$getjs."&vpb=".$vpb."\" >éditer</a> | ";
		
		
			
		}
		 
		$laliste .= "<tr bgcolor=\"white\" id=\"row_34\" onmouseout=\"this.className='lvtColData'\" onmouseover=\"this.className='lvtColDataHover'\" class=\"lvtColData\">
				 <td width=\"2%\"><input type=\"checkbox\"  value=\"".$data['id'.$cat]."---".$data['nom']."\" id=\"".$data['id']."\" name=\"id".$cat."ac[]\" class='delcheckbox_".$cat."'></td>
				 	
				 $selectpopup
				
				 $affichlist

				 

				 <td>$editer <a id=\"supp".$data['id'.$cat]."_".$cat."\">Sup</a>
						<script>
						$(function() {
						$( \"#supp".$data['id'.$cat]."_".$cat."\" ).click(function () {
						$( \"#dialog-confirmsupp".$data['id'.$cat]."_".$cat."\" ).dialog({
						resizable: false,
						height:140,
						modal: true,
						buttons: {
						\"Suprimer\": function() {
						$( this ).dialog( \"close\" );
							$(location).attr('href','".$chemin."traitement".$wintype.".php?cat=".$cat."&page=sup&id=".$data['id'.$cat]."&nom=".$data['nom']."&vpb=".$vpb."');
						},
						Cancel: function() {
						$( this ).dialog( \"close\" );
						}
						}
						});
						
						});
						});
						</script>
						
						<div style=\"display:none;\" id=\"dialog-confirmsupp".$data['id'.$cat]."_".$cat."\" title=\"Attention !!!\">
						<p><span class=\"ui-icon ui-icon-alert\" style=\"float:left; margin:0 7px 20px 0;\"></span>Etes vous sur de vouloir suprimer la ".$cat." : ".$data['nom']." ?</p>
						</div>				 
				 
				 
				 </td>
		      </tr>
			      			 ";
	}


if($addtype == "shared"){
	
	if($wintype == "index"){
		
		$addnew = "<a onclick=\"popup_shared_insert()\"> <img border=\"0\" title=\"Créer Affaire...\" alt=\"Créer Affaire...\" src=\"themes/softed/images/btnL3Add.gif\"></a>";
		
	}
	
}else{

$addnew = "<a href=\"".$new.$getjs."\"><img border=\"0\" title=\"Créer Affaire...\" alt=\"Créer Affaire...\" src=\"themes/softed/images/btnL3Add.gif\"></a>";
	
}
?>

<?php echo $addnew; ?>
<a><img  id="recherche_<?php echo $cat; ?>"  border="0" title="Rechercher dans Affaires..." alt="Rechercher dans Affaires..." src="themes/softed/images/btnL3Search.gif"></a>
<a><img  id="suppboot_<?php echo $cat; ?>"  border="0" title="Supprimer" alt="Suprimer" src="themes/softed/images/reportsDelete.gif"></a>

                                                                               
                   
					<div style="display:none;" id="dialog-confirmsuppgroup_<?php echo $cat; ?>" title="Attention !!!">
					<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Etes vous sur de vouloir suprimer les <?php echo $cat; ?> ?</p>
                    
					</div>	                                                                     
                			
                            
                            
<form id="formulairecontact_<?php echo $cat; ?>" name="formulairecontact_<?php echo $cat; ?>" action="<?php echo $chemin."traitement".$wintype.".php"; ?>" method="post">


 <input type="hidden" name = "page" value="list-action" >
<input type="hidden" name = "vpb" value="<?php echo $vpb; ?>" >
<input type="hidden" name = "cat" value="<?php echo $cat; ?>" >
<input type="hidden" name = "recherche" value='<?php echo  urldecode(json_encode($recherche));?>' >

<input style="display:none;" id="onvalid_<?php echo $cat; ?>" type="submit" name="submit"  value="Supprimer" class="crmbutton small delete">

<table width="100%" cellspacing="0" cellpadding="2" border="0" class="small">
			    <tbody><tr>
				<!-- Buttons -->

				<td  nowrap="" align="left"><p>Ordre : <?php echo  $ordre; ?></p></td>
				<td  align="right"><?php echo $paginate;?></td>	
       		    </tr>
			</tbody></table>
            
         
            
<table width="100%" cellspacing="1" cellpadding="3" border="0" class="table table-striped">
			      <tbody><tr>
             			 <td width="2%" class="lvtCol">
                         
                         <input type="checkbox"  id="selectall_<?php echo $cat; ?>"> 
                         
                        </td>
                        <?php if($wintype=="popup")echo "<td class=\"lvtCol\"></td>"; ?>
                         
                        <?php echo $lefiltre;?>
			             <td class="lvtCol">Action</td>
			         	   </tr>
                                                                
           
                                      <tr style="display:none;" class="theactifform_<?php echo $cat; ?>">
                                      <!-- recherche -->
                                      <td class="lvtColData"></td>
                                      <?php if($wintype=="popup")echo "<td class=\"lvtColData\"></td>"; ?>
                                      
                                      <?php echo $filtre; ?>
                                      
                                      <!-- fin recherche -->
                                      
             			 </tr>
                         
 										<?php echo $laliste; ?>                                      
			      			 </tbody></table>
				<td  nowrap="" align="left"></td>
				<td  align="right"><?php echo $paginate; ?></td>	
       		    </tr>
			</tbody></table>                       
</form>

<script>

	//
	function popup_shared_insert(){ var popy= window.open('popup.php?page=insert&cat=<?php echo $cat.$getjs."&relatifa=".$relatifa."&idrelation=".$idrelation."&vpb=".$vpbup; ?>','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 
						
				   
	$(function() {
	$( "#suppboot_<?php echo $cat; ?>" ).click(function () {
	$( "#dialog-confirmsuppgroup_<?php echo $cat; ?>" ).dialog({
	resizable: false,
	height:140,
	modal: true,
	buttons: {
	"Suprimer": function() {
	$( this ).dialog( "close" );
		
	
				$( "#onvalid_<?php echo $cat; ?>" ).click();
					
	},
	
	Cancel: function() {
	$( this ).dialog( "close" );
	}
	}
	});
	
	});
	});
	
	$(function() {
	$( "#selectall_<?php echo $cat; ?>" ).click(function () {
		
		if ( $( this ).prop( "checked" ) ){
			
			$(".delcheckbox_<?php echo $cat; ?>").prop( "checked" , true);
			
		}else{
			$(".delcheckbox_<?php echo $cat; ?>").prop( "checked" , false);
			
			//$("#formulairecontact").find(':checkbox').prop("checked", true);
		}
	
	
	});
	});
	
	$( "#recherche_<?php echo $cat; ?>" ).click(function () {
	if ( $( ".theactifform_<?php echo $cat; ?>" ).is( ":hidden" ) ) {
	$( ".theactifform_<?php echo $cat; ?>" ).slideDown( "slow" );
	} else {
	$( ".theactifform_<?php echo $cat; ?>" ).hide();
	}
	});
</script>