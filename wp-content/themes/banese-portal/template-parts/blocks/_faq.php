<?php
	$faqQuestion = get_sub_field('faqQuestion') ?: '';			 
	$faqAwnser = get_sub_field('faqAwnser') ?: '';
?>

<li>
	<a href=""><?php echo $faqQuestion ?></a>
	<div><?php echo $faqAwnser ?></div>
</li>