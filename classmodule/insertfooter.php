 <?php
$affichlist = "";
foreach($listeenplus as $value){
	
	if($_REQUEST[$cat.$id."list".$value] == "1"){
		$loadlist = "
$(function() {				
	$(\"#tbl_Potentials_Activities".$value."\").load(\"".$chemin."share".$wintype.".php?page=list&cat=".$value."&sh_url_".$cat."_".$value."=".$id."\", function() {
	

		$( this).slideDown( \"slow\" );

 
	});
});
";

	}else{
		$loadlist = "";
	}
	
	$affichlist .= "
	
<tr>
        <td class=\"dvInnerHeader\"><div id=\"buton".$value."\"> &nbsp;".$value."&nbsp; </div></td>
      </tr>
      <tr>
        <td class=\"lvtColData\"><div id=\"tbl_Potentials_Activities".$value."\" class=\"tiroir\" style=\"display: none;\"> </div>
         </td>
      </tr>
<script>
$( \"#buton".$value."\" ).click(function () {
				
			$(\"#tbl_Potentials_Activities".$value."\").load(\"".$chemin."share".$wintype.".php?page=list&cat=".$value."&sh_url_".$cat."_".$value."=".$id."\", function() {
				
			if ( $( this ).is( \":hidden\" ) ) {
			$( this).slideDown( \"slow\" );
			$.cookie('".$cat.$id."list".$value."', '1', {
				expire : 1,
				path : '/'
				});
			} else {
			$( this).hide();
			$.cookie('".$cat.$id."list".$value."', '0', {
				expire : 1,
				path : '/'
				});
			}
			});


});

".$loadlist."

</script>
";
	
	
	
}

?>
 
 <tr>
                    <td style="padding:5px" colspan="4"><div align="center">
                       <input type="submit" style="width:70px" value="Sauver" name="button"  class="btn btn-success" accesskey="S" title="Enregistrer [Alt+S]">
                        <input type="submit" style="width:70px" value="SaveQuit" name="button"  class="btn btn-primary start" accesskey="S" title="Enregistrer [Alt+S]">
                        <input type="button" style="width:70px" value="Annuler" name="button" onclick="window.history.back()" class="btn btn-warning cancel" accesskey="X" title="Annuler [Alt+X]">
                      </div></td>
                  </tr>
                    </tbody>
                  
                </table>
                
                <!--fin formulaire --></td>
            </tr>
              </tbody>
            
          </table>
          
        </form></td>
    </tr>
      </tbody>
    
  </table>
</div>

<?php
if($id != "new"){
	
	echo "<div id=\"tabs-2\">";
}else{
	
	echo "<div id=\"tabs-2\" display='none'>";
}


?>

  <table width="100%" cellspacing="0" cellpadding="0" border="0" class="small lvt">
    <tbody>
    
    

    
      



	<?php echo $affichlist; ?>
	
    
    
    
    
    
    </tbody>
  </table>





  
</div>

<?php 

if($ongletsup == 1){
	
	if($_REQUEST[$cat.$id] == "2"){
		$loadlistsup = "
$(function() {				
	$(\"#tabs-3\").load(\"".$linksup."\", function() {});
});
";

	}else{
		$loadlistsup = "";
	}
		
		$litabs = "
	<div id=\"tabs-3\"></div>
	
	
	<script>
	".$loadlistsup."
	$( \".tabs-3\" ).click(function () {
				
			$(\"#tabs-3\").load(\"".$linksup."\", function() {});


	});
	
	$( \".tabs-3\" ).click(function () {
	$.cookie('".$cat.$id."', '2', {
    expire : 1,
    path : '/'
	});
	
});
	</script>
	"
	;
		
	}

echo $litabs;
?>


</div>
<script>
	
	$( ".tabs-1" ).click(function () {
	
	$.cookie('<?php echo $cat.$id; ?>', '0', {
    expire : 1,
    path : '/'
	});
	
});

$( ".tabs-2" ).click(function () {
	$.cookie('<?php echo $cat.$id; ?>', '1', {
    expire : 1,
    path : '/'
	});
	
});		
		
			
			
</script>