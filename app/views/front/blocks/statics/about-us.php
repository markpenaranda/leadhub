<style>
.static-container{padding:10px; margin: 20px 0px; background: #FFF;}
</style>
<div class="container">
	<div class="wrapper">
		<div class="static-container">
			<h3>About Us</h3>
			<p><a href="<?=URL::to('/')?>" target="_blank">PINOYREAL.TV</a> is your online television platform that provides unique shows and viewing experience. PINOYREAL.TV shows ranges from lifestyle to entertainment, tailored for Filipino audiences here and around the globe.</p>
			<div class="row-fluid">
			<?php echo View::make('front/blocks/title_cards')->with(array('shows'=>$shows, 'classes'=>'span4','shown'=>false))?>
			</div>	
			<p><a href="<?=URL::to('/')?>" target="_blank">PINOYREAL.TV</a> platform features live streaming, chat, social-stream, feedback, Facebook open-graph and many more. Viewers can subscribe for free access to all programming 24/7.</p>
			<p>By revolutionizing the way TV is delivered and consumed at home andon the go. <a href="<?=URL::to('/')?>" target="_blank">PINOYREAL.TV</a> is your alternative source of entertainment anytime and anywhere you want it.</p>
			<p>The team behind <a href="<?=URL::to('/')?>" target="_blank">PINOYREAL.TV</a> is committed to deliver quality and innovative contents that are suited for general audiences.</p>
		</div>
	</div>
</div>