$(document).ready(function () {

 
 
    $("#addRow").on('click', function () {

        // Get the table object to use for adding a row at the end of the table
        var $itemsTable = $('#itemsTable');
		
		var $nbrow = parseInt($('.listrow:last').val())+parseInt(1);

        // Create an Array to for the table row. ** Just to make things a bit easier to read.
         var rowTemp = [
  "<tr class=\"item-row\" bgcolor=\"white\"  >",
          "<td width=\"60px\"><table width=\"100%\">",
          "    <tr>",
          "      <td width=\"10px\">J</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 30px;\" class=\"textbox j\" id=\"j"+$nbrow+"\" name=\"j"+$nbrow+"\"></td>",
          "    </tr>",
          "    <tr>",
          "      <td colspan=\"2\">//</td>",
          "    </tr>",
          "    <tr>",
          "      <td>O</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 30px;\" class=\"textbox o\" id=\"o"+$nbrow+"\" name=\"o"+$nbrow+"\"></td>",
          "    </tr>",
          "    <tr>",
          "      <td colspan=\"2\"><i id=\"deleteRow"+$nbrow+"\" class=\"icon-remove deleteRow\"></i></td>",
          "    <tr>",
          "  </table></td>",
          "<td><input type=\"text\" value=\"\"  class=\"textbox sevice\" id=\"sevice"+$nbrow+"\" name=\"service"+$nbrow+"\">",
          "  <br>",
          "  <textarea rows=\"1\"  name=\"servicenote"+$nbrow+"\" id=\"servicenote"+$nbrow+"\"  class=\"detailedViewTextBox servicenote\"></textarea>",
          "  <br>",
          "  <textarea rows=\"1\"  name=\"comclient"+$nbrow+"\" id=\"comclient"+$nbrow+"\"  class=\"detailedViewTextBox comclient\"></textarea></td>",
          "<td><input type=\"text\" disabled=\"disabled\"   tabindex=\"\" name=\"nomfournisseur"+$nbrow+"\" >",
          "  <input type=\"hidden\"  class=\"detailedViewTextBox idfournisseur\" value=\"\" tabindex=\"\" name=\"idfournisseur"+$nbrow+"\">",
          "  <a> <img border=\"0\" src=\"themes/softed/images/btnL3Search.gif\" alt=\"Rechercher dans Affaires...\" title=\"Rechercher dans clienr...\" id=\"popupsh"+$nbrow+"\" onclick='valideopenerformrowfournisseur("+$nbrow+")'></a> <br>",
          "  <textarea rows=\"1\"  name=\"comfournisseur"+$nbrow+"\" id=\"comfournisseur"+$nbrow+"\"  class=\"detailedViewTextBox comfournisseur\"></textarea></td>",
          "<td width=\"100px\"><table width=\"100%\">",
          "    <tr>",
          "      <td width=\"35px\">Global</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox coutglobal\" id=\"coutglobal"+$nbrow+"\" name=\"coutglobal"+$nbrow+"\"></td>",
          "    </tr>",
          "    <tr>",
          "      <td width=\"10px\">Pax</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox coutpax\" id=\"coutpax"+$nbrow+"\" name=\"coutpax"+$nbrow+"\"></td>",
          "    </tr>",
          "    <tr>",
          "      <td width=\"10px\">Marge</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox margeC\" id=\"margeC"+$nbrow+"\" name=\"margeC"+$nbrow+"\"></td>",
          "    </tr>",
          "  </table></td>",
          "<td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox pdvcout\" id=\"pdvcout"+$nbrow+"\" name=\"pdvcout"+$nbrow+"\"></td>",
          "<td><table width=\"100%\">",
          "    <tr>",
          "      <td width=\"35px\">SupS.</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox suos\" id=\"suos"+$nbrow+"\" name=\"suos"+$nbrow+"\"></td>",
          "    </tr>",
          "    <tr>",
          "      <td width=\"10px\">Marge</td>",
          "      <td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox margeS\" id=\"margeS"+$nbrow+"\" name=\"margeS"+$nbrow+"\"></td>",
          "    </tr>",
          "    <tr>",
          "  </table></td>",
          "<td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox pdvsups\" id=\"pdvsups"+$nbrow+"\" name=\"pdvsups"+$nbrow+"\"></td>",
          "<td><input type=\"text\" value=\"\"  style=\"width: 70px;\" class=\"textbox gratuite\" id=\"gratuite"+$nbrow+"\" name=\"gratuite"+$nbrow+"\"><input type=\"hidden\" value=\""+$nbrow+"\"  style=\"width: 70px;\" class=\"listrow\" id=\"listrow\" name=\"listrow[]\"></td>",
        "</tr>",
		
		" "].join('');

        var $row = $(rowTemp);

      
        

            // Add row after the first row in table
            $('.item-row:last', $itemsTable).after($row);
            

            
            // Remove row when clicked
            $row.find(".deleteRow").on('click', function () {
                // Remove this row we clicked on
                $(this).parents('.item-row').remove();
                // Show alert we removed the row
                updateMessage('.alert', 'Item was removed!', 2000);
                // Hide delete Icon if we only have one row in the list.
                if ($(".item-row").length < 2) $(".deleteRow").hide();
                // Update total
                update_total();
            });
			
			   $row.find("input").on('click', function () {
               
                update_total();
            });
			
			
			
			$( "#coutglobal"+$nbrow+" , #pax_devis" ).keyup(function() {
		
			var coutpax = $('#coutglobal'+$nbrow).val() / $('#pax_devis').val();
			coutpax = roundNumber(coutpax, 2);
			isNaN(coutpax) ? $('#coutpax'+$nbrow).val("N/A") : $('#coutpax'+$nbrow).val(coutpax);
		
			
			});
			
			
			$( "#coutpax"+$nbrow+" , #pax_devis" ).keyup(function() {
				
		var coutglobal = $('#coutpax'+$nbrow).val() * $('#pax_devis').val();
			coutglobal = roundNumber(coutglobal, 2);
			isNaN(coutglobal) ? $('#coutglobal'+$nbrow).val("N/A") : $('#coutglobal'+$nbrow).val(coutglobal);
			});
			
			
		
		
			$( "#coutpax"+$nbrow+" , #margeC"+$nbrow+" , #coutglobal"+$nbrow ).keyup(function() {
				
			var pmarge = $('#margeC'+$nbrow).val()/100;
			var pmarge = 1-pmarge;		
			var pdvcout = $('#coutpax'+$nbrow).val() / pmarge;
			
			//$('#coutpax0').val()/(1-($('#margeC0').val()/100))
				pdvcout = roundNumber(pdvcout, 2);
				isNaN(pdvcout) ? $('#pdvcout'+$nbrow).val("N/A") : $('#pdvcout'+$nbrow).val(pdvcout);
				
				
			});
			
			$( "#suos"+$nbrow+", #margeS"+$nbrow ).keyup(function() {
				
			var pmarge = $('#margeS'+$nbrow).val()/100;
			var pmarge = 1-pmarge;		
			var pdvsups = $('#suos'+$nbrow).val() / pmarge;
			
			//$('#coutpax0').val()/(1-($('#margeC0').val()/100))
				pdvsups = roundNumber(pdvsups, 2);
				isNaN(pdvsups) ? $('#pdvsups'+$nbrow).val("N/A") : $('#pdvsups'+$nbrow).val(pdvsups);
				
				
			});


            

        // End if last itemCode input is empty
        return false;
    });

}); 

 

//########################################################################################################################

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number, decimals) {
    var newString;// The new rounded number
    decimals = Number(decimals);
    if (decimals < 1) {
        newString = (Math.round(number)).toString();
    } else {
        var numString = number.toString();
        if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
            numString += ".";// give it one at the end
        }
        var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
        var d1 = Number(numString.substring(cutoff, cutoff + 1));// The value of the last decimal place that we'll end up with
        var d2 = Number(numString.substring(cutoff + 1, cutoff + 2));// The next decimal, after the last one we want
        if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
            if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
                while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                    if (d1 != ".") {
                        cutoff -= 1;
                        d1 = Number(numString.substring(cutoff, cutoff + 1));
                    } else {
                        cutoff -= 1;
                    }
                }
            }
            d1 += 1;
        }
        if (d1 == 10) {
            numString = numString.substring(0, numString.lastIndexOf("."));
            var roundedNum = Number(numString) + 1;
            newString = roundedNum.toString() + '.';
        } else {
            newString = numString.substring(0, cutoff) + d1.toString();
        }
    }
    if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
        newString += ".";
    }
    var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;
    for (var i = 0; i < decimals - decs; i++) newString += "0";
    //var newNumber = Number(newString);// make it a number if you like
    return newString; // Output the result to the form field (change for your purposes)
}

  $("#coutglobal0").on('keyup', function () {
                // Locate the row we are working with
                var $itemRow = $(this).closest('tr');
                // Update the price.
                updatePrice($itemRow);
            });
			
		