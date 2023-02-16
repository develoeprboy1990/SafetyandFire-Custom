<?php
	$Facebook_Link	= $_SESSION[WEBSITE_SETTINGS][3];
	$Facebook_Target=' target="_blank"';
	if($Facebook_Link=='')
	{
		$Facebook_Link='#';
		$Facebook_Target='';
	}

	$Twitter_Link	= $_SESSION[WEBSITE_SETTINGS][4];
	$Twitter_Target=' target="_blank"';
	if($Twitter_Link=='')
	{
		$Twitter_Link='#';
		$Twitter_Target='';
	}

	$Google_Link	= $_SESSION[WEBSITE_SETTINGS][5];
	$Google_Target=' target="_blank"';
	if($Google_Link=='')
	{
		$Google_Link='#';
		$Google_Target='';
	}

	$Pinterest_Link	= $_SESSION[WEBSITE_SETTINGS][9];
	$Pinterest_Target=' target="_blank"';
	if($Pinterest_Link=='')
	{
		$Pinterest_Link='#';
		$Pinterest_Target='';
	}

	$Instagram_Link	= $_SESSION[WEBSITE_SETTINGS][10];
	$Instagram_Target=' target="_blank"';
	if($Instagram_Link=='')
	{
		$Instagram_Link='#';
		$Instagram_Target='';
	}

	$Linkedin_Link	= $_SESSION[WEBSITE_SETTINGS][11];
	$Linkedin_Target=' target="_blank"';
	if($Linkedin_Link=='')
	{
		$Linkedin_Link='#';
		$Linkedin_Target='';
	}

	$CountCart = $Products->CountCart();
	$Web->query("select * from p_category where Status='".ACTIVE."' and ParentID=0 order by Sequence asc");
	$pC=0;
	while($Web->next_Record())
	{
		$pC++;
		$Link = WEB_URL."productss/category/".$Web->f('UrlKeyword').".html";
		$pCategories[$pC] = array($Web->f('TableID'), $Web->f('Title'), $Link);
	}
	$TotalpCat=count($pCategories);
?>

<!-- Top Bar -->
<section class="top-header">
	<div class="container">
    	<div class="fleft top-links">
        	<ul>
        		<li><a href="<?php echo WEB_URL; ?>page/about-us.html">About Us</a></li>
        		<li><a href="<?php echo WEB_URL; ?>contact-us.html">Contact Us</a></li>
        		<li><a href="<?php echo WEB_URL; ?>page/certification.html">Certification</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <?php ?>
		<div class="fright top-links">
			<ul>
				<!-- <li><a href="mailto:<?php //echo $_SESSION[WEBSITE_SETTINGS][2]; ?>"><?php //echo $_SESSION[WEBSITE_SETTINGS][2]; ?></a></li>
				<li class="phone"><?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?></li> -->
				<li class="phone">
					<a href="tel:<?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?>">
						<i class="fa fa-phone" aria-hidden="true" style="font-size:20px;color:white;"></i>&nbsp;&nbsp;<?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?>
					</a>
				</li>
            </ul>
        </div>
		<?php ?>
        <!-- <div class="clear"></div> -->
    </div>
</section>
<!-- <section class="header">
	<div class="container">
    	<div class="fleft logo"><a href="<?php echo WEB_URL; ?>"><img src="<?php echo IMAGES_PATH; ?>logo.png" alt="" style="width:400px;height:130px;" /></a></div>
        <div class="fright main-categories">
        	<ul>
            <?php
            	for($a=1; $a<=5; $a++)
				{

			?>
            	<li><a href="<?php echo $pCategories[$a][2]; ?>" class="<?php echo $mainCatClass[$a]; ?>"><?php echo $pCategories[$a][1]; ?></a></li>
            <?php } ?>	
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</section> -->

<!-- <section class="header">
	<div class="container">
    	<div class="fleft logo"><a href="<?php echo WEB_URL; ?>"><img src="<?php echo IMAGES_PATH; ?>logo.png" alt="" style="width:400px;height:130px;" /></a></div>
        <div class="fright main-categories">
        	<ul>
            <li><a href="http://localhost/ahsan/safetyandfire/productss/category/extinguishers.html" class="cakes">Extinguishers</a></li>
			<li><a href="http://localhost/ahsan/safetyandfire/productss/category/hose-reels.html" class="flowers">Hose Reels</a></li>
			<li><a href="http://localhost/ahsan/safetyandfire/productss/category/hydrants.html" class="balloons">Hydrants</a></li>
			<li><a href="http://localhost/ahsan/safetyandfire/productss/category/brackets-and-cabinets.html" class="">Brackets and Cabinets</a></li>
			<li><a href="http://localhost/ahsan/safetyandfire/productss/category/general-accessories.html" class="">General Accessories</a></li>	
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</section> -->

<!-- Main Menu -->
<div class="topnav" id="myTopnav">
	<div class="logo">
		<a href=""><img src="./images/logo.png" width="260" height="80"/></a>
	</div>
	<div class="navbar">
		<a href="#" class="home active">Home</a>
		<div>
			<div class="dropdown">
				<button class="dropbtn">Extinguishers 
					<i class="fa-solid fa-angle-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">DCP Extinguishers</a>
					<a href="#">Co2 Extinguishers</a>
					<a href="#">Mobile Extinguishers</a>
					<a href="#">Co2 Extinguisher Spares & Accfont-sizeessories</a>
					<a href="#">DCP Extinguisher Spares & Accessories</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Hose Reels 
					<i class="fa-solid fa-angle-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">Fire Hose Reels</a>
					<a href="#">Fire Hose Reel Spares</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Hydrants 
					<i class="fa-solid fa-angle-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">Hydrants and Accessories</a>
					<a href="#">Layflats Hose, Nozzles and Couplings</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">Brackets and Cabinets 
					<i class="fa-solid fa-angle-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">Brackets</a>
					<a href="#">Cabinets and Covers</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn">General Accessories
					<i class="fa-solid fa-angle-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="#">Fire Blankets</a>
					<a href="#">Ring Gauges and General Accessories</a>
					<a href="#">Alarm Station</a>
					<a href="#">Dry Chemical Powder</a>
					<a href="#">Signs and Labels</a>
				</div>
			</div>
		</div>
	</div>
	<div class="btn">
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			&#9776;
		</a>
	</div>
</div>

<!-- JavaScript for Main Menu-->
<script>
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
</script>