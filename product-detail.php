<?php
include_once("classes/config.php");
$MetaTitle = $_SESSION[WEBSITE_SETTINGS][6];
include_once("html_header.php");
include_once("header.php");
$ProductDetail = $Web->getRecord($_REQUEST['Keyword'], 'UrlKeyword', 'products');
if($ProductDetail['TableID']=='' || $ProductDetail['Status']==INACTIVE)
	$Web->Redirect(WEB_URL);
	
$ProductID = $ProductDetail['TableID'];
$ProductDescription = $Web->FilterDescription($ProductDetail['Description']);
$SubCategory = $Web->getRecord($ProductDetail['CategoryID'], 'TableID', 'p_category');
if($SubCategory['ParentID']!=0)
{
	$ParentCategory = $Web->getRecord($SubCategory['ParentID'], 'TableID', 'p_category');
	$PageTitle = $ParentCategory["Title"]." / ".$SubCategory["Title"];
}
else
{
	$PageTitle = $SubCategory["Title"];
}
$Web->query("select * from web_images 
where Type='".IMAGE_TYPE_PRODUCT_GALLERY."' 
and ParentID='$ProductID' 
order by Sequence asc");
$CountPhotos = $Web->num_rows();
if($CountPhotos>0)
{
	$Images = array();
	while($Web->next_Record())
	{
		$Images[] = WEB_URL.IMAGES_FOLDER."/".$Web->f('FileName');
	}
}
$Stock=10;
?>
<section class="main-content inner-page">
<div class="container">
<?php include_once("left_categories.php"); ?>
<div class="main-rj">
<section class="products-listing">
    <div class="heading-rj"><h2><?php echo $PageTitle; ?></h2></div>
    <div class="pDetailpage heading-rj">
    <div class="fleft product-images exzoom hidden" id="exzoom">
       
    <div class="exzoom_img_box">
        <ul class='exzoom_img_ul'>
        <?php 
		foreach($Images as $Image) {
		$ThumbImage = WEB_URL."thumb.php?src=".$Image."&w=430";
		echo '<li><img src="'.$ThumbImage.'" alt="" /></li>';
		 } ?>
        </ul>
    </div>
    <div class="exzoom_nav"></div>
    <p class="exzoom_btn">
        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
    </p>

        <?php
			/*if($CountPhotos>0)
			{
				$MainImage = WEB_URL."thumb.php?src=".$Images[0]."&w=430";
				echo '<img src="'.$MainImage.'" alt="" class="main-image" />';
				echo '<a id="pi-prev"></a><a id="pi-next"></a>';
				echo '<ul class="pImagesList">';
					foreach($Images as $Image) {
						$ThumbImage = WEB_URL."thumb.php?src=".$Image."&w=120&h=70";
						echo '<li><a data-lightbox="gallery" href="'.$Image.'"><img src="'.$ThumbImage.'" alt="" /></a></li>';
					}
				echo '</ul>';
			}
		?>
         <?php
			/*if($CountPhotos>0)
			{
				$MainImage = WEB_URL."thumb.php?src=".$Images[0]."&w=430";
				echo '<img src="'.$MainImage.'" alt="" class="main-image" />';
				echo '<a id="pi-prev"></a><a id="pi-next"></a>';
				echo '<ul class="pImagesList">';
					foreach($Images as $Image) {
						$ThumbImage = WEB_URL."thumb.php?src=".$Image."&w=120&h=70";
						echo '<li><a data-lightbox="gallery" href="'.$Image.'"><img src="'.$ThumbImage.'" alt="" /></a></li>';
					}
				echo '</ul>';
			}*/
		?>
        </div>
    	<div class="fleft product-detail">
        	<h2><?php echo $ProductDetail['Title']; ?></h2>
            
            <p><?php echo $ProductDetail['ShortDesc']; ?></p>
            <form name="AddToCartForm" id="AddToCartForm" method="post" action="">
            	<input type="hidden" name="AddToCartFlag" id="AddToCartFlag" value="" />
                <input type="hidden" name="ProductID" id="ProductID" value="<?php echo $ProductID; ?>" />
                <div class="available">
                <ul>
                <?php
					$Web->query("select B.TableID, B.Title, B.ColorCode 
					from product_color A 
					inner join p_color B on B.TableID=A.ColorID 
					where A.ProductID='$ProductID' 
					and B.Status='".ACTIVE."'");
					if($Web->num_rows()>0)
					{
				?>
				<li class="color-box">
				<select name="Color" id="Color">
                	<option value="">Select Color</option>
					<?php while($Web->next_Record()) { ?>
						<option value="<?php echo $Web->f('TableID'); ?>" data-imagesrc="<?php echo WEB_URL; ?>colorimg.php?c=<?php echo $Web->f('ColorCode'); ?>"><?php echo $Web->f('Title'); ?></option>
					<?php } ?>    
				</select>
				</li>
				<?php
					}
					else
					{ echo '<input type="hidden" name="Color" value="-1" />'; }
					
					$Web->query("select B.TableID, B.Title 
					from product_size A 
					inner join p_size B on B.TableID=A.SizeID 
					where A.ProductID='$ProductID' 
					and B.Status='".ACTIVE."'");
					
					if($Web->num_rows()>0)
					{
				?>
                <li class="size-box">
                    <select name="Size" id="Size">
                    <option value="">Select Size</option>
                        <?php while($Web->next_Record()) { ?>
                            <option value="<?php echo $Web->f('TableID'); ?>"><?php echo $Web->f('Title'); ?></option>
                        <?php } ?>
                    </select>
                </li>
                <?php		
					}
					else
					{ echo '<input type="hidden" name="Size" value="-1" />'; }
					?>
                    
                    
                
                
                <?php
				$Web->query("select * 
					from product_attribute  
					where ProductID='$ProductID' AND label!=''");					
					if($Web->num_rows()>0)
					{
				?>
                <li class="size-box">
                    <table border="1" style="width:100%;">
                    <thead><tr><th>Label</th><th>Value</th></tr></thead>
                    <tbody>
                        <?php while($Web->next_Record()) { ?>
                        <tr><td><?php echo $Web->f('label'); ?></td><td><?php echo $Web->f('value'); ?></td></tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </li>
                <?php } ?>
                </ul>
                <span id="CartMsg">&nbsp;</span>
                </div>
            </form>
    	</div>
    	
        <div class="clear"></div>
        
        <div class="product-description">
        	<h2>More Description</h2>
            <div class="CmsDescription"><?php echo $ProductDescription; ?></div>
        </div>
    </div>
</section>

<section class="products-listing">
    <div class="heading-rj"><h2>Linked Product</h2></div>
    <?php
		$Query = "Select p.TableID, p.Title, p.Price, p.Image, p.UrlKeyword 
		from products p
		INNER JOIN product_link_products lp On p.TableID = lp.LinkProductID
		AND p.Status='".ACTIVE."'
		AND lp.ProductID  = '".$ProductID."'		
		order by p.Sequence asc";	
		$Products->ShowLinkedProducts($Query);
	?>
</section>
</div>

<div class="clear"></div>
</div>
</section>
<?php
	include_once("subscription.php");
	include_once("footer.php");
	include_once("html_footer.php");
?>