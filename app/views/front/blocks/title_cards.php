<style type="text/css">
<?php 
	if(isset($css)){
		foreach($css as $key=>$value){
			echo "." . $key . " { ";

			foreach($value as $style_type => $style_value){
				echo $style_type.": ".$style_value.";";
			}
				
			echo "}";
		}
	}
?>

.title-card{padding:10px;}
.title-card p {text-indent: 10px;}
.title-card p.desc{font-size: 12px; line-height: 150%; text-align: justify;}
</style>
<?php foreach($shows as $show):
		 if(isset($show->images)): 
?>
	<div class="<?=$classes?> show-item title-card">
	<?php 	
				foreach ($show->images as $image) :
						if($image['enabled'] == '1'): ?>
						<div class="row-fluid">
							<div class="span12">
								<a href="/show/<?=$show->slug?>"><img src="<?php echo Image::getImageSize($image['path'], 290, 163); ?>" alt="picture" class="img-polaroid"></a>
							</div>
						</div>
			<?php			break; 
						endif;
				endforeach;
			 ?>
		<?php if(!isset($shown) || $shown):?>
		<p class="show-title"><a href="/show/<?php echo $show->slug; ?>"><?php echo $show->name; ?></a></p>
		<p class="desc"><?php echo Str::limit($show->description,140,'<a href="/show/'.$show->slug.'">..see more</a>');  ?></p>
		<?php endif;?>
	</div>
<?php endif; 
	endforeach; ?>