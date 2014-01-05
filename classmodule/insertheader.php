<?php

$tabs = $_REQUEST[$cat.$id];

if 	($tabs == ""){
	
	$tabs = 0;
	
}

if($wintype=="popup" && $id != "new" ){
													
		if(isset($_REQUEST['js'])) {

			$getjs = "&js=".$_REQUEST['js'];
		
			$sqlpopupaction = "SELECT  * FROM js WHERE js = '".$_REQUEST['js']."' LIMIT 1 ";
			$req = mysql_query($sqlpopupaction) or die('Erreur SQL !<br>'.$sqlpopupaction.'<br>'.mysql_error());
		
			while($data = mysql_fetch_assoc($req)) {
				
				$js = $data['script'];
				
			}
		
		}
	 
		
	  $selectpopup = "
	  
	  <script type='text/javascript'>
		function validepopupform".$id."(){
		
		".str_replace("[id".$cat."]",$id,$js)."
	
		}
		</script>
	  
	  <input type='hidden' value='".$id."' id='text".$id."' name='text".$id."' />

	<input  type='hidden' value='".$nom."' id='nomtext".$id."' name='nomtext".$id."' />
<input class=\"crmbutton small save\" type='button' value='Select & Close' onclick='validepopupform".$id."()' />

";
	 
 }else{
	 
	 $selectpopup = "";
	 
	 
 }
 
if($id != "new"){
	
	
	
	$litabs = "
	<li><a href=\"#tabs-1\" class=\"tabs-1\">$cat information</a></li>
	<li><a href=\"#tabs-2\" class=\"tabs-2\">Information supplementaire</a></li>
	";
	
	if($ongletsup == 1){
		
		$litabs .= "
	<li><a href=\"#tabs-3\" class=\"tabs-3\">".$titreongletsup."</a></li>";
		
	}
	
}else{
	
	$litabs = "
	<li><a href=\"#tabs-1\" class=\"tabs-1\">Affaire information</a></li>
	";
	
	
}

?>
<script>




$(function() {

var tabs = $( "#tabs" ).tabs({
collapsible: true ,
active: <?php echo $tabs; ?>
});
tabs.find( ".ui-tabs-nav" ).sortable({
axis: "x",
stop: function() {
tabs.tabs( "refresh" );
}
});


});








</script>

<div id="tabs">
<ul>
  <?php echo $litabs; ?>
</ul>
<div id="tabs-1">
  <table width="100%" cellspacing="0" cellpadding="3" border="0" style="border-bottom:0;" class="dvtContentSpace">
      <tbody>
    
    <tr valign="top">
      <td><form enctype="multipart/form-data" id="formulairecontact_<?php echo $cat; ?>" name="formulairecontact_<?php echo $cat; ?>" action="<?php echo $chemin."traitement".$wintype."form.php"; ?>" method="POST">
          <table width="100%" cellspacing="0" cellpadding="5" border="0">
              <tbody>
            
            <tr>
              <td style="border-bottom:1px dotted #cccccc" class="lvtHeaderText"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                    <tr>
                      <td><span class="lvtHeaderText">Gestion des <?php echo $cat; ?></span> <br></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td><!--le formulaire -->
                
                <table width="100%" cellspacing="0" cellpadding="0" border="0" class="small">
                    <tbody>
                  
                  <tr>
                    <td style="padding:5px" colspan="4"><div align="center">
                        <input type="submit" style="width:70px" value="Sauver" name="button"  class="btn btn-success" accesskey="S" title="Enregistrer [Alt+S]">
                        <input type="submit" style="width:70px" value="SaveQuit" name="button"  class="btn btn-primary start" accesskey="S" title="Enregistrer [Alt+S]">
                        <input type="button" style="width:70px" value="Annuler" name="button" onclick="window.history.back()" class="btn btn-warning cancel" accesskey="X" title="Annuler [Alt+X]">
                        <?php  echo $selectpopup;?>
                      </div></td>
                  </tr>