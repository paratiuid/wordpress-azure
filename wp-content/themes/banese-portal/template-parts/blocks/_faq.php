<?php
	$faqQuestion = get_sub_field('faqQuestion') ?: '';			 
	$faqAwnser = get_sub_field('faqAwnser') ?: '';
?>

<li>
	<a href="javascript:;" class="bp__faq_question"><?php echo $faqQuestion ?></a>
	<div class="bp__faq_awnser" style="display: none;"><?php echo $faqAwnser ?></div>
</li>