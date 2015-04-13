<?php
include_once("include/header.php");

$menu = array (
				array (
						'url' => 'cms.php',
						'text' => 'CMS Manager',
						'image' => '1.jpg',
						'class'=>'orange'
						
						),
						
				array (
						'url' => 'gallery.php',
						'text' => 'Gallery',
						'image' => '2.jpg',
						'class'=>'blue'
						),
						
				array (
						'url' => 'menu.php',
						'text' => 'Menu',
						'image' => '2.jpg',
						'class'=>'red'
						),
				);


?>	
	<div>
      	<ul class="stats">
		<?php
		
			foreach ($menu as $parent) 
			{
			    echo '<li class='.$parent['class'].'>
					  <i class="icon-star"></i>
					 <div class="details">
					 	<a href='.$parent['url'].'><span>' . $parent['text'] . '</span></a>
					 </div>';
					 
			}

?>
	   	</ul>
    		</div>
			