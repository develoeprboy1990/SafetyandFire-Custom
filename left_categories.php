<!-- <aside class="fleft categories-list">
	<div class="heading" id="ShowMobileCat"><h2>Browse by Category</h2></div>
    <div class="categories-ul">
    <ul id="menu">
    <?php
		foreach($pCategories as $pCategory)
		{
	?>
    	<li>
			<a href="<?php echo $pCategory[2]; ?>">
				<?php echo $pCategory[1]; ?>
		    </a>
			<?php echo $Products->ProductSubCategories($pCategory[0]); ?>
		</li>
    <?php
		}
	?>    
    </ul>
    </div>
</aside> -->

<!-- Code By RJ -->
<!-- Sidebar Menu -->
<aside class="side-menu-rj">
	<!-- Search Box -->
	<div class="container-rj">
		<div class="wrapper-rj">
			<input type="text" name="search-rj" id="search-rj" placeholder="Search here" autocomplete="chrome-off">
			<button><i class="fa fa-search"></i></button>
			<div class="results-rj">
			</div>
		</div>
	</div>
	<!-- Side Menu -->
	<ul class="accordion-menu-rj">
		<?php foreach($pCategories as $pCategory) { ?>
		<li>
				<div class="dropdownlink-rj"><?php echo $pCategory[1]; ?>
				<i class="fa fa-chevron-down" aria-hidden="true"></i>
				</div>
			<?php echo $Products->ProductSubCategories($pCategory[0]); ?>
		</li>
		<?php } ?> 	</ul>
</aside>
<!-- JavaScript -->
<script>
	// Side Menu Js
	$(function() {
    	var Accordion = function(el, multiple) {
      		this.el = el || {};
      		// more then one submenu open?
      		this.multiple = multiple || false;
      
      		var dropdownlink = this.el.find('.dropdownlink-rj');
      		dropdownlink.on('click', { el: this.el, multiple: this.multiple }, this.dropdown);
    	};
    
    	Accordion.prototype.dropdown = function(e) {
      		var $el = e.data.el,
         	 $this = $(this),
          	//this is the ul.submenuItems
          	$next = $this.next();
      
      		$next.slideToggle();
      		$this.parent().toggleClass('open');
      
			if(!e.data.multiple) {
				//show only one menu at the same time
				$el.find('.submenuItems-rj').not($next).slideUp().parent().removeClass('open');
			}
    	}
    
    	var accordion = new Accordion($('.accordion-menu-rj'), false);
	});

// Search Box JS
// Define suggested keywords
	let availableKeyWords = [
		'html',
		'css',
		'javascript',
		'jquery',
		'react'
	];

	const searchInput = document.getElementById('search-rj');
	const searchWrapper = document.querySelector('.wrapper-rj');
	const resultsWrapper = document.querySelector('.results-rj');

	searchInput.addEventListener('keyup', () => {
		let results = [];
		let input = searchInput.value;
		if (input.length) {
			results = availableKeyWords.filter((item) => {
				return item.toLowerCase().includes(input.toLowerCase());
			});
		}
		renderResults(results);
	});

	function renderResults(results) {
		if (!results.length) {
			return searchWrapper.classList.remove('show-rj');
		}

		const content = results.map((item) => {
			return `<li>${item}</li>`;
		}).join('');

		searchWrapper.classList.add('show-rj');
		resultsWrapper.innerHTML = `<ul>${content}</ul>`;
	}
</script>