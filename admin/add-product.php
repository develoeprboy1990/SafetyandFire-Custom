<?php
$RecordID='';
$Content["Status"]=ACTIVE;
$ReadOnly='';
$Title='Add New Product';
if(isset($_REQUEST['PageType']) && isset($_REQUEST['ID']) && $_REQUEST['PageType']=='Edit' && $_REQUEST['ID']!='')
{
	$RecordID = $_REQUEST['ID'];
	$Content = $Web->getRecord($_REQUEST['ID'], "TableID", "products");
    $attribute = $Web->getRecord($_REQUEST['ID'], "ProductID", "product_attribute");
	if($Content["TableID"]=='')
		$Web->Redirect("index.php?page=products");
		
	 $ReadOnly=' readonly="readonly"';
	 $Title='Edit Product';
}
?>
<div class="Page-Data">
<h1><?php echo $Title; ?></h1>
<form name="RecordForm" id="RecordForm" method="post" action="" onsubmit="return ValidateProduct();" enctype="multipart/form-data">
<input type="hidden" name="ValidateProductFlag" id="ValidateProductFlag" />
<input type="hidden" name="RecordID" id="RecordID" value="<?php echo $RecordID; ?>" />
<input type="hidden" name="Stock" id="Stock" value="100" />

<table width="100%" cellpadding="5" cellspacing="0" border="0">
	<tr>
	  <td align="left">Brand</td>
	  <td align="left"><select name="BrandID" id="BrandID" class="DropDown">
        	<option value="">Please Select</option>
            <?php echo $Web->getSelectDropDownWhereField($Content["BrandID"], "TableID", "Title", "Status", ACTIVE, "p_brands", "Title"); ?>
        </select></td>
	  </tr>
	<tr>
	  <td align="left">Category</td>
	  <td align="left"><select name="CategoryID" id="CategoryID" class="DropDown">
	      <option value="">Please Select</option>
	      <?php
				$Web->query("select * from p_category where Status='".ACTIVE."' and ParentID='0' order by Sequence asc");
				if($Web->num_rows()>0)
				{
					while($Web->next_Record())
					{
						$pCat = $Web->f('TableID');
						$Selected='';
						if($pCat==$Content["CategoryID"])
							$Selected=' selected';
			?>
	      <option value="<?php echo $pCat; ?>"<?php echo $Selected; ?>><?php echo $Web->f('Title'); ?></option>
	        <?php
				$Web2->query("select * from p_category where Status='".ACTIVE."' and ParentID='$pCat' order by Sequence asc");
				if($Web2->num_rows()>0)
				{
					while($Web2->next_Record())
					{
						$Selected='';
						if($Web2->f('TableID')==$Content["CategoryID"])
							$Selected=' selected';
			?>
	        <option value="<?php echo $Web2->f('TableID'); ?>"<?php echo $Selected; ?>>&nbsp;--&nbsp;<?php echo $Web2->f('Title'); ?></option>
	        <?php			
					}
				}
			?>
	        
	      <?php			
					}
				}
			?>
	      </select></td>
	</tr>
	<tr>
    	<td width="25%" align="left">Title</td>
        <td width="75%" align="left"><input type="text" name="Title" id="Title" class="Textfield" value="<?php echo $Content["Title"]; ?>" /></td>
    </tr>
	<tr>
	  <td align="left" valign="top" style="padding-top:7px;">Short Description</td>
	  <td align="left" valign="top" style="padding-top:7px;">
      	<textarea name="ShortDesc" id="ShortDesc" class="TextArea"><?php echo $Content['ShortDesc']; ?></textarea>
      </td>
	  </tr>
	<tr>
	  <td align="left">Product Code</td>
	  <td align="left"><input type="text" name="Code" id="Code" class="Textfield" value="<?php echo $Content["Code"]; ?>" /> 
	  (Leave it empty to create random code)</td>
	  </tr>
	<tr>
	  <td align="left">Price</td>
	  <td align="left"><input type="text" name="Price" id="Price" class="Textfield" value="<?php echo $Content["Price"]; ?>" onKeyPress="return numbersonly(event, false)" />&nbsp;<?php echo DEFAULT_CURRENCY; ?></td>
	  </tr>
	<?php /*?><tr>
	  <td align="left">Color</td>
	  <td align="left"><?php
	  	$Web->query("select * from p_color where Status='".ACTIVE."' order by Title asc");
		if($Web->num_rows()>0)
		{
			echo '<table cellpadding="0" cellspacing="0" border="0">';
			echo '<tr><td colspan="2"><a onclick="SelectAll(\'Colors\');">All Color</a></td></tr>';
			while($Web->next_Record())
			{
				if($RecordID!='')
				{
					$Checked='';
					$Web2->query("select * from product_color where ProductID='$RecordID' and ColorID='".$Web->f('TableID')."'");
					if($Web2->num_rows()>0)
						$Checked=' checked="checked"';
				}
				echo '<tr>';
				echo '<td><input type="checkbox" name="Colors[]" id="Color_'.$Web->f('TableID').'" value="'.$Web->f('TableID').'"'.$Checked.' /></td>';
				echo '<td><label for="Color_'.$Web->f('TableID').'">'.$Web->f('Title').'</label></td>';
				echo '</tr>';
			}
			echo '</table>';
		}
		else
			echo "<strong>Please first add color</strong>";
	  ?></td>
	  </tr>
	<tr>
	  <td align="left">Size</td>
	  <td align="left"><?php
	  	$Count=0;
	  	$Web->query("select * from p_size where Status='".ACTIVE."' order by Title asc");
		if($Web->num_rows()>0)
		{
			echo '<table cellpadding="0" cellspacing="0" border="0">';
			echo '<tr><td colspan="2"><a onclick="SelectAll(\'Sizes\');">All Size</a></td></tr>';
			while($Web->next_Record())
			{
				if($RecordID!='')
				{
					$Checked='';
					$Stock='';
					$Web2->query("select * from product_size where ProductID='$RecordID' and SizeID='".$Web->f('TableID')."'");
					if($Web2->num_rows()>0)
					{
						$Web2->next_Record();
						$Checked=' checked="checked"';
						$Stock = $Web2->f('Stock');
					}
				}
				echo '<tr>';
				echo '<td><input type="checkbox" name="Sizes[]" id="Size_'.$Web->f('TableID').'" value="'.$Web->f('TableID').'"'.$Checked.' /></td>';
				echo '<td><label for="Size_'.$Web->f('TableID').'" id="Label_'.$Count.'">'.$Web->f('Title').'</label></td>';
				echo '</tr>';
				$Count++;
			}
			echo '</table>';
		}
		else
			echo "<strong>Please first add size</strong>";
	  ?></td>
	  </tr><?php */?>
	<!--------------------------------Attribute added here--------------------------------->
    <tr>
	<?php if(isset($_REQUEST['PageType']) && isset($_REQUEST['ID']) && $_REQUEST['PageType']=='Edit' && $_REQUEST['ID']!=''){?>
    <td align="left">Attributes</td>
      <td align="left">
	  <table id="myTable" class=" table order-list">
                    <thead>
                        <tr>
                            <td align="center">Lable</td>
                            <td align="center">Value</td>
                            
                        </tr>
                    </thead>
        <?php
		$Web->query("select * from  product_attribute where ProductID='$RecordID' order by id asc");
		if($Web->num_rows()>0)
		{ ?>
			<tbody>
			<?php
            while($Web->next_Record())
			{
		?>            
                        <tr>
                            <td class="col-sm-4">
                             <input type="text" name="pro_lable[]" id="pro_lable" value="<?php echo $Web->f('label'); ?>" class="form-control Textfield" />
                            </td>
                            <td class="col-sm-4">
                             <input type="text" name="pro_value[]" id="pro_value" value="<?php echo $Web->f('value'); ?>"  class="form-control Textfield"/>
                            </td>
                            <td class="col-sm-2"><a type="button" class="ibtnDel btn btn-md"><img src="images/delete-sign.png" alt="delete btn" style="width:15px; height:15px;" title="delete this row"></a></td>
                        </tr>
         <?php } ?>
             </tbody>
             <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: left;">
                                <a class="btn btn-lg btn-block " id="addrow">
                                    <img src="images/text-plus-icon.png" style="width:15px; height:15px;" title="click to add new row" alt="add btn">
                                </a>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </tfoot>
             
	  <?php
	  	}
		else
			echo "<strong>Please first add attributes</strong>";
	  ?></table></td>
      <?php }else{ ?>
     <td align="left" valign="top" style="padding-top:7px;">Attributes</td>
        <td align="left" valign="top">
            <table id="myTable" class=" table order-list">
                    <thead>
                        <tr>
                            <td align="center">Lable</td>
                            <td align="center">Value</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-sm-4">
                                <input type="text" name="pro_lable[]" id="pro_lable" value="<?php echo $attribute["label"]; ?>" class="form-control Textfield" />
                            </td>
                            <td class="col-sm-4">
                                <input type="text" name="pro_value[]" id="pro_value" value="<?php echo $attribute["value"]; ?>"  class="form-control Textfield"/>
                            </td>
                            <td class="col-sm-2"><a class="deleteRow"></a>

                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: left;">
                                <a class="btn btn-lg btn-block " id="addrow">
                                    <img src="images/text-plus-icon.png" style="width:15px; height:15px;" title="click to add new row" alt="add btn">
                                </a>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
        </td>
      <?php }?>
      </tr>
    <!--------------------------------------Attribute End Here------------------------------------->
	<tr>
	  <td colspan="2" align="left">Description<br /><textarea name="Description" id="Description" class="tinymce"><?php echo $Content["Description"]; ?></textarea></td>
	  </tr>
	<tr>
	  <td align="left">In Featured</td>
	  <td align="left"><table cellpadding="0" cellspacing="0" border="0">
	    <tr>
	      <?php
            	foreach($ActiveInactive as $Key => $Value)
            	{
					$Checked='';
					if($Key==$Content["InFeatured"])
						$Checked = ' checked';
			?>
	      <td><input type="radio" name="InFeatured" value="<?php echo $Key; ?>" id="InFeatured_<?php echo $Key; ?>2"<?php echo $Checked; ?> /></td>
	      <td>&nbsp;</td>
	      <td><label for="InFeatured_<?php echo $Key; ?>2"><?php echo $Value; ?></label></td>
	      <td>&nbsp;&nbsp;</td>
	      <?php	
            	}
            ?>
	      </tr>
	    </table></td>
	  </tr>
	<tr>
	  <td align="left">Add in Best Sell</td>
	  <td align="left"><table cellpadding="0" cellspacing="0" border="0">
	    <tr>
	      <?php
            	foreach($ActiveInactive as $Key => $Value)
            	{
					$Checked='';
					if($Key==$Content["InHome"])
						$Checked = ' checked';
			?>
	      <td><input type="radio" name="InHome" value="<?php echo $Key; ?>" id="InHome_<?php echo $Key; ?>2"<?php echo $Checked; ?> /></td>
	      <td>&nbsp;</td>
	      <td><label for="InHome_<?php echo $Key; ?>2"><?php echo $Value; ?></label></td>
	      <td>&nbsp;&nbsp;</td>
	      <?php	
            	}
            ?>
	      </tr>
	    </table></td>
	  </tr>
	<tr>
	  <td align="left">Active</td>
	  <td align="left">
	    <table cellpadding="0" cellspacing="0" border="0">
	      <tr>
	        <?php
            	foreach($ActiveInactive as $Key => $Value)
            	{
					$Checked='';
					if($Key==$Content["Status"])
						$Checked = ' checked';
			?>
	        <td><input type="radio" name="Status" value="<?php echo $Key; ?>" id="Status_<?php echo $Key; ?>"<?php echo $Checked; ?> /></td>
	        <td>&nbsp;</td>
	        <td><label for="Status_<?php echo $Key; ?>"><?php echo $Value; ?></label></td>
	        <td>&nbsp;&nbsp;</td>
	        <?php	
            	}
            ?>
	        </tr>
	      </table>
	    </td>
	  </tr>
      
      
      <tr>
	  <td align="left">In Linked Product</td>
	  <td align="left">
	    <table cellpadding="0" cellspacing="0" border="0">
	      <tr>
	        <?php
            	foreach($ActiveInactive as $Key => $Value)
            	{
					$Checked='';
					if($Key==$Content["InLinkedProduct"])
						$Checked = ' checked';
			?>
	        <td><input type="radio" name="InLinkedProduct" value="<?php echo $Key; ?>" id="InLinkedProduct<?php echo $Key; ?>"<?php echo $Checked; ?> /></td>
	        <td>&nbsp;</td>
	        <td><label for="InLinkedProduct<?php echo $Key; ?>"><?php echo $Value; ?></label></td>
	        <td>&nbsp;&nbsp;</td>
	        <?php	
            	}
            ?>
	        </tr>
            </table>
	    </td>
	  </tr>
            
           
    <tr id="add_link_product" <?php if($Content["InLinkedProduct"] == 1){ }else{ ?> style="display:none;"<?php } ?>>
    <td align="left" valign="top" style="padding-top:7px;">Linked Products</td>
    <td align="left" valign="top">
    <select name="LinkedProductID[]" id="LinkedProductID" class="DropDown" multiple="multiple" style="width:600px;height:400px;">
	      <option value="" disabled="disabled">Please Select</option>
	      <?php
				$Web->query("select * from p_category where Status='".ACTIVE."' and ParentID='0' order by Sequence asc");
				if($Web->num_rows()>0)
				{
					while($Web->next_Record())
					{
						$pCat = $Web->f('TableID');
						
			?>
	      <option disabled="disabled" value="<?php echo $pCat; ?>"><?php echo $Web->f('Title'); ?></option>
	        <?php
				$Web2->query("select * from p_category where Status='".ACTIVE."' and ParentID='$pCat' order by Sequence asc");
				if($Web2->num_rows()>0)
				{
					while($Web2->next_Record())
					{
					$CatID = $Web2->f('TableID');
					?>
		<option disabled="disabled" value="<?php echo $Web2->f('TableID'); ?>">&nbsp;--&nbsp;<?php echo $Web2->f('Title'); ?></option>
					<?php
		//			echo "select * from products where Status='".ACTIVE."' and CategoryID='$CatID' AND 	TableID != '".$_REQUEST['ID']."' order by Sequence asc";exit;
                    $Web3->query("select * from products where Status='".ACTIVE."' and CategoryID='$CatID' AND 	TableID != '".$_REQUEST['ID']."' order by Sequence asc");
                    if($Web3->num_rows()>0)
                    {				
                    while($Web3->next_Record())
                    {
					$LinkProductID = $Web4->getLinkFieldData('LinkProductID', 'LinkProductID', $Web3->f('TableID'), 'ProductID',$_REQUEST['ID'], 'product_link_products');
					$Selected='';
                    if($_REQUEST['PageType']=='Edit' && $Web3->f('TableID')==$LinkProductID)
                    $Selected=' selected';
                    ?>
         <option value="<?php echo $Web3->f('TableID'); ?>"<?php echo $Selected; ?>>&nbsp;&nbsp;&nbsp;--&nbsp;<?php echo $Web3->f('Title'); ?></option>
							<?php			
                            }
                            }
                            ?>        
					<?php			
					}
				}
			?>
	        
	      <?php			
					}
				}
			?>
	      </select></td>
    </tr>
            
	      
      
    <tr>
    	<td>&nbsp;</td>
        <td align="left"><input type="submit" name="SubmitBtn" id="SubmitBtn" value="Submit" class="Button" /></td>
    </tr>
    
</table>
</form>
</div>
<?php if($Content["TableID"]!='') { ?>
<script>
LoadSubCategory('<?php echo $Content["ParentID"]; ?>', '<?php echo $Content["CategoryID"]; ?>');
</script>
<?php } ?>
<script>
    $(document).ready(function () {
        var counter = 0;
        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" id="pro_lable" class="form-control Textfield" name="pro_lable[]"/></td>';
            cols += '<td><input type="text" id="pro_value" class="form-control Textfield" name="pro_value[]"/></td>';
            

            cols += '<td><a type="button" class="ibtnDel btn btn-md"><img src="images/delete-sign.png" alt="delete btn" style="width:15px; height:15px;" title="delete this row"></a></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });
        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();       
            counter -= 1
        });
    });
	
	
	$("#InLinkedProduct1").on("click", function () {
        $("#add_link_product").css('display','table-row');
     });
	 	$("#InLinkedProduct0").on("click", function () {
        $("#add_link_product").css('display','none');
     });
        

 	/*function edit_attr(){
 			var a = ["a", "b", "c"];
 a.forEach(function(entry) {
     console.log(entry);
 });
 		        var newRow = $("<tr>");
 		            var cols = "";

 		            cols += '<td><input type="text" id="pro_lable" class="form-control Textfield" name="pro_lable[]"/></td>';
 		            cols += '<td><input type="text" id="pro_value" class="form-control Textfield" name="pro_value[]"/></td>';
		            

 		            cols += '<td><a type="button" class="ibtnDel btn btn-md"><img src="images/delete-sign.png" alt="delete btn" style="width:15px; height:15px;" title="delete this row"></a></td>';
 		            newRow.append(cols);
 		            $("table.order-list").append(newRow);
 		            counter++;

 		}
    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }
    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }*/
</script>