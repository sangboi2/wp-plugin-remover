<?php
/**
 * @package RemoverPlugin
 */
/*
Plugin Name: A Sangbawi Controller Plugin
Plugin URI: https://akismet.com/
Description: A really simple wp-plugin. SangbawiPlugin is quite possibly the best way to remove your pages and posts from <strong>the dashboard</strong>.
Version: 1.2.1
Author: Sangbawi
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: Remover
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// Security! Make sure we don't expose any info if called directly.
// 1
//if (!defined('ABSPATH')){
//   die;
// }

// 2
// defined('ABSPATH') or die('Hey! There is nothing going on here if you are human');

// 3

if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class DBEnabledPlugin
{
    public function __construct()
    {
        add_action("admin_menu", array($this, "create_menu_item")); //tell WP to create a custom menu item
        add_action("admin_init", array($this, "dbenabled_settings_page")); //instruct WP to create the settings page
        add_action("admin_menu", array($this, "remove_menus")); //actual callback to remove menu items, based on options in DB    
    }

    // Add settingspage content and funtionality
    public function dbenabled_settings_page()
    {
        // Add settings sections in settings page (Only one section in this case)
        add_settings_section(
            "menuhide",
            "Set a check mark on the element that you want to hide from dashboard",
            null,
            "dbenabled"
        );
        

        /*
        *
        *
        * REGISTERING IN DB
        *
        */
        
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-dashboard"
        );
        
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-posts"
        );

        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-media"
        );

        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-pages"
        );
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-comments"
        );
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-WPforms"
        );
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-elementor"
        );
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-templates"
        );
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-appearence"
        );
        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-plugins"
        );

        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-users"
        );

        // Register setting in DB
        register_setting(
            "menuhide",
            "db-hide-tools"
        );

        /*
        *
        *
        * DISPLAYING NAMES
        *
        */
        // Names to display on dashboard

    
        // Add settings field to the section created above
        add_settings_field(
            "db-hide-dashboard", //id
            "Dashboard", //name to display
            array($this, "hide_dashboard"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into
        );

         // Add settings field to the section created above. 
         add_settings_field(
                    
            "db-hide-posts", //id
            "Posts", //name to display
            array($this, "hide_posts"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 
        
         // Add settings field to the section created above. 
         add_settings_field(
            
            "db-hide-media", //id
            "Media", //name to display
            array($this, "hide_media"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        );

         // Add settings field to the section created above. 
         add_settings_field(
                    
            "db-hide-pages", //id
            "Pages", //name to display
            array($this, "hide_pages"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 
       
        

        // Add settings field to the section created above. 
        add_settings_field(
            
            "db-hide-comments", //id
            "Comments", //name to display
            array($this, "hide_comments"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 

        // Add settings field to the section created above. 
        add_settings_field(
            
            "db-hide-wpforms", //id
            "WPForms", //name to display
            array($this, "hide_wpforms"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 

          // Add settings field to the section created above. 
          add_settings_field(
            
            "db-hide-elementor", //id
            "Elementor", //name to display
            array($this, "hide_elementor"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 

        // Add settings field to the section created above. 
        add_settings_field(
            
            "db-hide-templates", //id
            "Templates", //name to display
            array($this, "hide_templates"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 

        // Add settings field to the section created above. 
        add_settings_field(
            
            "db-hide-appearence", //id
            "Appearence", //name to display
            array($this, "hide_appearence"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 

         // Add settings field to the section created above. 
         add_settings_field(
            
            "db-hide-plugins", //id
            "Plugins", //name to display
            array($this, "hide_plugins"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 

         // Add settings field to the section created above. 
         add_settings_field(
            
            "db-hide-users", //id
            "Users", //name to display
            array($this, "hide_users"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 
        // Add settings field to the section created above. 
        add_settings_field(
            
            "db-hide-tools", //id
            "Tools", //name to display
            array($this, "hide_tools"), //callback function
            "dbenabled", //page identifier
            "menuhide" //Section to add the field into 
        ); 
        

    }

    /*
    *
    *
    * CALLBACK FUNCTION
    *
    */

    
    // Callback function for checkbox that hides the dashboard
    public function hide_dashboard()
    {
        //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
        echo '<input type="checkbox" name="db-hide-dashboard" value="1" ' . checked(1, get_option('db-hide-dashboard'), false) . '/>';
	}


   // Callback function for checkbox that hides the posts
   public function hide_posts()
   {
       //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
       echo '<input type="checkbox" name="db-hide-posts" value="1" ' . checked(1, get_option('db-hide-posts'), false) . '/>';
   }
    // Callback function for checkbox that hides the posts
    public function hide_media()
    {
        //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
        echo '<input type="checkbox" name="db-hide-media" value="1" ' . checked(1, get_option('db-hide-media'), false) . '/>';
    }

    // Callback function for checkbox that hides the posts
    public function hide_pages()
    {
        //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
        echo '<input type="checkbox" name="db-hide-pages" value="1" ' . checked(1, get_option('db-hide-pages'), false) . '/>';
    }

     // Callback function for checkbox that hides the posts
     public function hide_comments()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-comments" value="1" ' . checked(1, get_option('db-hide-comments'), false) . '/>';
     }


     // Callback function for checkbox that hides the posts
     public function hide_wpforms()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-wpforms" value="1" ' . checked(1, get_option('db-hide-wpforms'), false) . '/>';
     }

     // Callback function for checkbox that hides the posts
     public function hide_elementor()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-elementor" value="1" ' . checked(1, get_option('db-hide-elementor'), false) . '/>';
     }

     // Callback function for checkbox that hides the posts
     public function hide_templates()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-templatess" value="1" ' . checked(1, get_option('db-hide-templates'), false) . '/>';
     }

     // Callback function for checkbox that hides the posts
     public function hide_appearence()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-appearence" value="1" ' . checked(1, get_option('db-hide-appearence'), false) . '/>';
     }


     // Callback function for checkbox that hides the posts
     public function hide_plugins()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-plugins" value="1" ' . checked(1, get_option('db-hide-plugins'), false) . '/>';
     }

     // Callback function for checkbox that hides the posts
     public function hide_users()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-users" value="1" ' . checked(1, get_option('db-hide-users'), false) . '/>';
     }

     // Callback function for checkbox that hides the posts
     public function hide_tools()
     {
         //Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string.
         echo '<input type="checkbox" name="db-hide-tools" value="1" ' . checked(1, get_option('db-hide-tools'), false) . '/>';
     }





    // Markup for the settingspage. Callback for 'menu-item' method.
    public function create_settings_page()
    {
        echo '<div class="wrap">
	          <h1  style="color:#333; font-size:2.2rem; font-weigth:bold; text-transform: uppercase;"> Sangbawi Controller Settings</h1>
  		 	  <!-- options.php is a Wordpress file that does most logic -->
              
          <form method="post" action="options.php">';
		
		// Insert section, fields and save button
        do_settings_sections("dbenabled"); //output all settings sections 
        settings_fields("menuhide"); //WP built-in function
        submit_button();
		
		echo '</form></div>';
	}


    // Adds the settingspage as subpage to general options.
    public function create_menu_item()
    {
		add_submenu_page(
			"options-general.php", //which WordPress file to add it to
			"DB Enabled Plugin Settings", 
			"Remover", //Menu item name
			"manage_options", 
			"dbenabled", 
			array($this, "create_settings_page") //callback function when clicked...
		);
    }
    
    //Remove the actual menu item
    public function remove_menus()
    {
        // If option checkbok is checked - hide posts menu item
		if (get_option("db-hide-dashboard") == 1) 
		{
            remove_menu_page("index.php");
        }

        // If option checkbok is checked - hide pages menu item
        if (get_option("db-hide-posts") == 1) 
		{
            remove_menu_page("edit.php");
        }

        // If option checkbok is checked - hide pages menu item
        if (get_option("db-hide-media") == 1) 
		{
            remove_menu_page("upload.php");
        }

        // If option checkbok is checked - hide media menu item
        if (get_option("db-hide-pages") == 1) 
		{
            remove_menu_page("edit.php?post_type=page");
        }
        // If option checkbok is checked - hide comments menu item
        if (get_option("db-hide-comments") == 1) 
		{
            remove_menu_page("edit-comments.php");
        }

        // If option checkbok is checked - hide wpforms menu item
        if (get_option("db-hide-wpforms") == 1) 
		{
            remove_menu_page("admin.php?page=wpforms-overview");
        }

        // If option checkbok is checked - hide elementor menu item
        if (get_option("db-hide-elementor") == 1) 
		{
            remove_menu_page("admin.php?page=elementor");
        }

        // If option checkbok is checked - hide users menu item
        if (get_option("db-hide-templates") == 1) 
		{
            remove_menu_page("edit.php?post_type=elementor_library&tabs_group=library");
        }
         // If option checkbok is checked - hide tools menu item
         if (get_option("db-hide-appearence") == 1) 
         {
             remove_menu_page("themes.php");
         }

         // If option checkbok is checked - hide pluginss menu item
         if (get_option("db-hide-plugins") == 1) 
         {
             remove_menu_page("plugins.php");
         }

         // If option checkbok is checked - hide pluginss menu item
         if (get_option("db-hide-users") == 1) 
         {
             remove_menu_page("users.php");
         }
         
          // If option checkbok is checked - hide pluginss menu item
          if (get_option("db-hide-tools") == 1) 
          {
              remove_menu_page("tools.php");
          }
         
    }

}

// Instansiate the class
$pluginObj = new DBEnabledPlugin();