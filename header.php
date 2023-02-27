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
		$pCategories[$pC] = array($Web->f('TableID'), $Web->f('Title'), $Link,$Web->f('UrlKeyword'));
	}
	$TotalpCat=count($pCategories);
?>

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
        <?php ?><div class="fright top-links">
			<ul>
        	<!-- <li><a href="mailto:<?php //echo $_SESSION[WEBSITE_SETTINGS][2]; ?>"><?php //echo $_SESSION[WEBSITE_SETTINGS][2]; ?></a></li>
             <li class="phone"><?php //echo $_SESSION[WEBSITE_SETTINGS][1]; ?></li> -->
             <li class="phone"><a href="tel:<?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?>"><i class="fa fa-phone" aria-hidden="true" style="font-size:20px;color:white;"></i>&nbsp;&nbsp;<?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
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

<!-- Main Menu by RJ -->
<section>
	<header>
		<nav>
			<!-- Logo -->
			<div class="logo">
				<a href="<?php echo WEB_URL; ?>">
					<img src="<?php echo IMAGES_PATH; ?>logo.png" alt="Safety and Fire" width="250" height="70"/>
				</a>
			</div>

			<!-- Nvabar Links -->
			<ul class="nav-menu">
				<li><a href="<?php echo WEB_URL; ?>" class="active-rj">Home</a></li>
				<?php
				for($a=1; $a<=5; $a++)
				{

				?>
				<li>
					<a href="<?php echo $pCategories[$a][2]; ?>" class="nav-link <?php echo $pCategories[$a][3]; ?>">
						<label for="<?php echo $pCategories[$a][3]; ?>" class="toggle">
						<?php echo $pCategories[$a][1]; ?> 
						<i class="fa-solid fa-angle-down"></i>
						</label>
					</a>
					<input type="checkbox" id="<?php echo $pCategories[$a][3]; ?>" /> 
					<?php echo $Products->HomeSubCategories($pCategories[$a][0]); ?>
				</li>
				<?php } ?>
			</ul>

			<!-- Search Box -->
			<!-- <div class="search-box">
				<input type="text" placeholder="Search" class="search-box__input" aria-label="search"/>
				<button class="search-box__button" aria-label="submit search">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</div> -->
		</nav>
	</header>
</section>

<!-- Navbar Button -->
<div class="hamburger-container">
	<div class="menu-toggle">
		<div class="hamburger">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>
	</div>
</div>

<!-- JavaScript for Menu Toggling -->
<script>
	// Setup hamburger menu
	{
		const menu_toggle = document.querySelector(".menu-toggle");
		const sidebar = document.querySelector(".nav-menu");

		menu_toggle.addEventListener("click", () => {
			menu_toggle.classList.toggle("active");
			sidebar.classList.toggle("active");
		});
	}
</script>