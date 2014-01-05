
<script>

	//
	$(function() {
	$( "#debut_<?php echo $cat; ?>" ).datepicker({ dateFormat:"dd/mm/yy"});
	});
	$(function() {
	$( "#fin_<?php echo $cat; ?>" ).datepicker({ dateFormat:"dd/mm/yy"});
	});
	$(function() {
	$( "#dateecheance_<?php echo $cat; ?>" ).datepicker({ dateFormat:"dd/mm/yy"});
	});



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
	
	function valideopenerformclient(){ var popy= window.open('popup.php?page=list&cat=client&js=insert-<?php echo $cat; ?>-valideopenerformclient','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 


function editformclient(){ var popy= window.open('popup.php?page=insert&cat=client&idclient=<?php echo $idclient; ?>','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 

function editformnomaffaire(){ var popy= window.open('popup.php?page=insert&cat=affaire&idaffaire=<?php echo $idaffaire; ?>','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 
</script>