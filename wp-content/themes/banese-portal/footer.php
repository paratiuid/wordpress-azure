<link rel="stylesheet" href="/wp-content/themes/banese-portal/plugins/swiper/swiper-bundle.css">
<script src="/wp-content/themes/banese-portal/plugins/swiper/swiper-bundle.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function(event) {
    	console.log("DOM completamente carregado e analisado");

		const swiper = new Swiper('.swiper', {
			slidesPerView: 1,
			loop: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
				renderBullet: function (index, className) {
            		return '<li class="'+className+'">\
								<span></span>\
							</li>';
          		},
			},
			
		});
	});
	
</script>