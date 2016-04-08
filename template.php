<?php

/**
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "tech_15" to match
 *    your subthemes name, e.g. if you name your theme "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "tech_15".
 * 2. Uncomment the required function to use.
 */


function tech_15_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 12;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('GO!'); // Change the text on the submit button
    //$form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/css/images/search-icon.png');

// Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
  }
} 


// Hide profile picture on profile page

function tech_15_preprocess_page(&$variables){

    if (arg(0)=="user" || arg(0)=="users" ){

        unset ($variables['page']['content']['system_main']['user_picture']);
    }
}


/**
 * Override or insert variables into the html templates.
 */
function tech_15_preprocess_html(&$vars) {
  // Load the media queries styles
  // Remember to rename these files to match the names used here - they are
  // in the CSS directory of your subtheme.
  $media_queries_css = array(
  );
  load_subtheme_media_queries($media_queries_css, 'tech_15');

	// ... there might be other stuff here ...
	$body_classes = array($vars['classes_array']);
	if ($vars['user']) {
	foreach($vars['user']->roles as $key => $role){
	$role_class = 'role-' . str_replace(' ', '-', $role);
	$vars['classes_array'][] = $role_class;
	}
	// Drupal 7 in hook_preprocess_html()
	drupal_add_http_header('X-UA-Compatible', 'IE=edge,chrome=1');
}

 /**
  * Load IE specific stylesheets
  * AT automates adding IE stylesheets, simply add to the array using
  * the conditional comment as the key and the stylesheet name as the value.
  *
  * See our online help: http://adaptivethemes.com/documentation/working-with-internet-explorer
  *
  * For example to add a stylesheet for IE8 only use:
  *
  *  'IE 8' => 'ie-8.css',
  *
  * Your IE CSS file must be in the /css/ directory in your subtheme.
  */
  /* -- Delete this line to add a conditional stylesheet for IE 7 or less.
  $ie_files = array(
    'lte IE 7' => 'ie-lte-7.css',
  );
  load_subtheme_ie_styles($ie_files, 'tech_15');
  // */
}

/* -- Delete this line if you want to use this function
function tech_15_process_html(&$vars) {
}
// */

/**
 * Override or insert variables into the page templates.
 */
/* -- Delete this line if you want to use these functions
function tech_15_preprocess_page(&$vars) {
}

function tech_15_process_page(&$vars) {
}
// */

/**
 * Override or insert variables into the node templates.
 * Un-hidden by mbosma on 12/16/2012 to add custom user view mode templates.
*/
/*
function tech_15_preprocess_user_profile(&$vars) {
  if ($vars['view_mode'] == 'user_full_name') {
    $vars['theme_hook_suggestions'][] = 'user_profile__user_full_name';
  }
}
*/
function tech_15_preprocess_node($vars) {
  if (arg(0) == 'node' && is_numeric(arg(1)) && arg(1) == '5244') {
    drupal_add_css(path_to_theme() . "/css/prospective-students.css");
  }
}
/*
function tech_15_preprocess_node(&$vars) {
  if($vars['view_mode'] == 'user_full_name') {
    $vars['theme_hook_suggestions'][] = 'node__' . 'user_full_name';
  }
}

function tech_15_process_node(&$vars) {
}
// */

/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function tech_15_preprocess_comment(&$vars) {
}

function tech_15_process_comment(&$vars) {
}
// */

/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function tech_15_preprocess_block(&$vars) {
}

function tech_15_process_block(&$vars) {
}
// */

/**
 * Add the Style Schemes if enabled.
 * NOTE: You MUST make changes in your subthemes theme-settings.php file
 * also to enable Style Schemes.
 */
/* -- Delete this line if you want to enable style schemes.
// DONT TOUCH THIS STUFF...
function get_at_styles() {
  $scheme = theme_get_setting('style_schemes');
  if (!$scheme) {
    $scheme = 'style-default.css';
  }
  if (isset($_COOKIE["atstyles"])) {
    $scheme = $_COOKIE["atstyles"];
  }
  return $scheme;
}
if (theme_get_setting('style_enable_schemes') == 'on') {
  $style = get_at_styles();
  if ($style != 'none') {
    drupal_add_css(path_to_theme() . '/css/schemes/' . $style, array(
      'group' => CSS_THEME,
      'preprocess' => TRUE,
      )
    );
  }
}
// */




