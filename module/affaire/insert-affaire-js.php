
<script>
$(window).load(function() {
 
    $("#formulairecontact_<?php echo $cat; ?>").validity(function() {
		
		$("#nom_<?php echo $cat; ?>").require("Veuillez saisir un nom de tache");
 
    });
 
});


//function valideopenerformclient(){ var popy= window.open('popup.php?page=list&cat=client&js=insert-<?php echo $cat; ?>-valideopenerformclient','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 

function valideopenerformclient(){ 

				$.fancybox.open({
					href : 'popup.php?page=list&cat=client&js=insert-<?php echo $cat; ?>-valideopenerformclient',
					type : 'iframe',
					padding : 5,
					autoWidth : true,
					width		: '100%'
				});
 } 


function editformclient(){ var popy= window.open('popup.php?page=insert&cat=client&idclient=<?php echo $idclient; ?>','popup_form','menubar=no,status=no,top=50%,left=50%,height=700,width=900,scrollbars=1') } 
  
$(function() {
$( "#debutdate_<?php echo $cat; ?>" ).datepicker({ dateFormat:"dd/mm/yy"});
});
$(function() {
$( "#findate_<?php echo $cat; ?>" ).datepicker({ dateFormat:"dd/mm/yy"});
});
$(function() {
$( "#echeance_<?php echo $cat; ?>" ).datepicker({ dateFormat:"dd/mm/yy"});
});
										
var editor = new TINY.editor.edit('editor', {
	id: 'description_<?php echo $cat; ?>',
	width: 584,
	height: 175,
	cssclass: 'tinyeditor',
	controlclass: 'tinyeditor-control',
	rowclass: 'tinyeditor-header',
	dividerclass: 'tinyeditor-divider',
	controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
		'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
		'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
		'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
	footer: true,
	fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
	xhtml: true,
	cssfile: 'custom.css',
	bodyid: 'editor',
	footerclass: 'tinyeditor-footer',
	toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
	resize: {cssclass: 'resize'}
});
</script>