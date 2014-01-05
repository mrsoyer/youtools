
	
	<table width="100%" cellspacing="0" cellpadding="3" border="0" style="border-bottom:0;" class="dvtContentSpace">
      <tbody>
    
    <tr valign="top">
      <td><form enctype="multipart/form-data" id="formulairecontact_".$cat."" name="formulairecontact_".$cat."" action="".$chemin."traitement".$wintype."form.php" method="POST">
          <table width="100%" cellspacing="0" cellpadding="5" border="0">
              <tbody>
            
            <tr>
              <td style="border-bottom:1px dotted #cccccc" class="lvtHeaderText"><table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                    <tr>
                      <td><span class="lvtHeaderText">Gestion des ".$cat."</span> <br></td>
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