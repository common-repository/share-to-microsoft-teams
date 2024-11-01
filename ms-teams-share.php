<?php
/*
Plugin Name: Share to Microsoft Teams
Plugin URI: https://teams.handsontek.net/
Description: WordPress websites can use the launcher script to embed Share to Teams buttons on their webpages which will launch the Share to Teams experience in a popup window when clicked. This will allow you to share a link directly to any person or Microsoft Teams channel without switching context.
Version: 1.0.0
Author: Joao Ferreira
Author URI: https://handsontek.net
Text Domain: ms-teams-share
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

//Register the Microsoft Teams script on the site
wp_register_script('microsoft_teams', 'https://teams.microsoft.com/share/launcher.js', array(), false, '1.0.0');
wp_enqueue_script('microsoft_teams');

//Register the Microsoft Teamd plugin script 
wp_register_style('microsoft_teams_styles', plugin_dir_url( __FILE__ ) . 'css/ms-teams-share.css', false, '1.0.0');
wp_enqueue_style('microsoft_teams_styles');


add_action( 'wp_head', 'add_share_to_ms_teams_button' );

function add_share_to_ms_teams_button(){

  ?>
  <script>
    document.addEventListener('DOMContentLoaded', share_to_ms_teams_action, false);
    
    function share_to_ms_teams_action(){
        var msteamsbtn = document.createElement("div");                 	// Create a MS Teams button node
    		
    	var attClass = document.createAttribute("class");       			// Create a "class" attribute
    	attClass.value = "teams-share-button wp-plugin";                    // Set the value of the class attribute
    	msteamsbtn.setAttributeNode(attClass); 
    	
    	var attData = document.createAttribute("data-href");       			// Create a "class" attribute
    	attData.value = document.location.href;                    			// Set the value of the class attribute
    	msteamsbtn.setAttributeNode(attData); 
    		
    	document.body.appendChild(msteamsbtn);                              // Append MS Teams to the body

    	shareToMicrosoftTeams.renderButtons();
    }    
  </script>
  <?php
  
}

