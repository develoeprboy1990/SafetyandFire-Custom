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
             <li class="phone"><?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?></li> -->
             <li class="phone"><a href="tel:<?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?>"><i class="fa fa-phone" aria-hidden="true" style="font-size:20px;color:white;"></i>&nbsp;&nbsp;<?php echo $_SESSION[WEBSITE_SETTINGS][1]; ?></a></li>
            </ul>
        </div><?php?>
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
				<li>
					<a href="javascript:void(0)" class="nav-link">
						<label for="droplist1" class="toggle">
							Extinguishers <i class="fa-solid fa-angle-down"></i>
						</label>
					</a>
					<input type="checkbox" id="droplist1" />
					<ul class="sub">
						<li><a href="#">DCP Extinguishers</a></li>
						<li><a href="#">Co2 Extinguishers</a></li>
						<li><a href="#">Mobile Extinguishers</a></li>
						<li><a href="#">Co2 Extinguisher Spares & Accessories</a></li>
						<li><a href="#">DCP Extinguisher Spares & Accessories</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0)" class="nav-link">
						<label for="droplist2" class="toggle">
							Hose Reels <i class="fa-solid fa-angle-down"></i>
						</label>
					</a>
					<input type="checkbox" id="droplist2" />
					<ul class="sub">
						<li><a href="#">Fire Hose Reels</a></li>
						<li><a href="#">Fire Hose Reel Spares</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0)" class="nav-link">
						<label for="droplist3" class="toggle">
							Hydrants <i class="fa-solid fa-angle-down"></i>
						</label>
					</a>
					<input type="checkbox" id="droplist3" />
					<ul class="sub">
						<li><a href="#">Hydrants and Accessories</a></li>
						<li><a href="#">Layflats Hose, Nozzles and Couplings</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0)" class="nav-link">
						<label for="droplist4" class="toggle">
							Brackets and Cabinets <i class="fa-solid fa-angle-down"></i>
						</label>
					</a>
					<input type="checkbox" id="droplist4" />
					<ul class="sub">
						<li><a href="#">Brackets</a></li>
						<li><a href="#">Cabinets and Covers</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0)" class="nav-link">
						<label for="droplist5" class="toggle">
							General Accessories <i class="fa-solid fa-angle-down"></i>
						</label>
					</a>
					<input type="checkbox" id="droplist5" />
					<ul class="sub">
						<li><a href="#">Fire Blankets</a></li>
						<li><a href="#">Ring Gauges and General Accessories</a></li>
						<li><a href="#">Alarm Station</a></li>
						<li><a href="#">Dry Chemical Powder</a></li>
						<li><a href="#">Signs and Labels</a></li>
					</ul>
				</li>
			</ul>

			<!-- Search Box -->
			<div class="search-box">
				<input type="text" placeholder="Search" class="search-box__input" aria-label="search"/>
				<button class="search-box__button" aria-label="submit search">
					<i class="fa-solid fa-magnifying-glass"></i>
				</button>
			</div>
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