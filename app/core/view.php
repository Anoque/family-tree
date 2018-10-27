<?php
Class view{
	
	function generate($content_view,$template,$data=null){
		include "app/view/".$template;
	}
}
?>