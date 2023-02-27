<?php
	include_once("classes/config.php");
	$MetaTitle = $_SESSION[WEBSITE_SETTINGS][6];
	include_once("html_header.php");
	include_once("header.php");
	include_once("banner.php");
?>

<section class="main-content home-content-rj">
	<div class="container">
		<!-- Left Sidebar -->
		<!-- Removed -->

		<!-- ========= Main Content ========= -->
		<!-- Featured Products -->
		<section class="featured-products-rj">
			<div class="heading-rj"><h2>Featured Products</h2></div>
			<?php
				$Query = "select TableID, Title, Price, Image, UrlKeyword 
				from products  
				where Status='".ACTIVE."'
				and InFeatured='".ACTIVE."'
				order by Sequence asc";
				$Products->ShowProducts($Query);
			?>
		</section>

		<!-- Best selling Products -->
		<section class="best-sellings-rj">
			<div class="heading-rj"><h2>Best Sellings</h2></div>
			<?php
				$Query = "select TableID, Title, Price, Image, UrlKeyword 
				from products  
				where Status='".ACTIVE."'
				and InHome='".ACTIVE."'
				order by Sequence asc";
				$Products->ShowProducts($Query);
			?>
		</section>
		<div class="clear"></div>
	</div>
</section>

<?php
	include_once("subscription.php");
	include_once("footer.php");
	include_once("html_footer.php");
?>


