<?php
/*
Plugin Name: headwaythemes-filter-wrapper
Plugin URI: http://www.ramgad.com/software/wordpress/wordpress-plugins/
Description: Possibility for non-programmers to use some filters through the setting's panel of this plugini. Works only with the headwaythemes.com!
Version: 1.0.7
Author: Jeannot Muller
Author URI: http://www.ramgad.com/
Min WP Version: 2.1
Max WP Version: 3.1.1
*/

// Update routines
	if ('insert' == $HTTP_POST_VARS['action_hfw']) {
    	update_option("hfw_link",$_POST['hfw_link']);
    	update_option("hfw_copyright",$_POST['hfw_copyright']);
    	update_option("hfw_go_to_top",$_POST['hfw_go_to_top']);
}

if (!class_exists('hfw_main')) {
    class hfw_main {
		/**
		* PHP 4 Compatible Constructor
		*/
		function hfw_main(){$this->__construct();}
		
		/**
		* PHP 5 Constructor
		*/		
		function __construct(){
			// Registrieren der WordPress-Hooks
			add_action('admin_menu', 'hfw_description_add_menu');
			add_filter('headway_link', 'hfw_link', 1);
			add_filter('headway_copyright', 'hfw_copyright', 1);
			add_filter('headway_go_to_top', 'hfw_go_to_top', 1);
		}
		// Registration of WordPress-Hooks
	}

function hfw_description_option_page() {
	?>

	<!-- Start Options Adminarea (xhtml) -->
	  <div class="wrap">
	    <h2>Headwaythemes-Filter-Wrapper Options</h2>
		         <div style="margin-top:20px;">
		         <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>&amp;updated=true">
		                          <div style="">
						<table class="form-table">
						<tr><th scope="col" colspan="3" cellpadding="15">Settings</th></tr>
		                                <tr><th scope="row">headway_link:</th><td>
		                    <input name="hfw_link" size="60" value="<?=get_option("hfw_link");?>" type="text" /></td></tr>
						<tr><th scope="row">headway_copyright:</th><td>
		                    <input name="hfw_copyright" size="60" value="<?=get_option("hfw_copyright");?>" type="text" /></td></tr>
						<tr><th scope="row">headway_go_to_top</th><td>
			            <input name="hfw_go_to_top" size="60" value="<?=get_option("hfw_go_to_top");?>" type="text" /></td></tr>
</table>
	      <br>
	      <p class="submit_hfw"><input name="submit_hfw" type="submit" id="submit" value="Save changes &raquo;">
	     <input class="submit_hfw" name="action_hfw" value="insert": type="hidden" /></p>
	    </form>
	  </div>
	</div>
	<p style="text-align:justify;">After saving these changes will be active immediately on your <a href="http://headwaythemes.com/" target="_blank">Headwaythemes</a>. Please be aware that your need a DEVELOPER LICENSE to overwrite the original link back to headway themes! Respect Copyright!
	<p style="text-align:justify;">If you have problems with HFW (headways-filter-wrapper), please feel free to drop a comment at: <a href="http://www.ramgad.com/software/wordpress/wordpress-plugins/">http://www.ramgad.com/software/wordpress/wordpress-plugins/</a></p>

<?php

} // Ende Funktion hfw_description_option_page()

// Adminmenu Optionen erweitern
function hfw_description_add_menu() {
      global $hfw_link, $hfw_copyright, $hfw_go_to_top;
      add_options_page('HFW', 'HFW', 9, __FILE__, 'hfw_description_option_page'); //optionenseite hinzufügen
}

function hfw_link() {
   $hfw_link = get_option('hfw_link');
   return $hfw_link;
}

function hfw_copyright() {
	$hfw_copyright = get_option('hfw_copyright');
	return $hfw_copyright;
}

function hfw_go_to_top() {
	$hfw_go_to_top = get_option('hfw_go_to_top');
	return $hfw_go_to_top;
}
}


//instantiate the class
if (class_exists('hfw_main')) {
	$hfw_main = new hfw_main();
}
?>
