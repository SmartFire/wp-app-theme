<?php 
$angular = new WPAPP_THEME();
$angular->angularScripts();
get_template_part('templates/page', 'header'); 
?>

<div ng-app="wpApp">
	<ng-view></ng-view>
</div>
