<?php
/*
	*This is the page template that displays all pages. Regions are identified here. DO NOT APPLY STYLES IN THIS PAGE!
 */
?>

<div id="page-wrapper"><div id="page">
<?php 
$mynodetype = "none";
if (isset($node)){
$mynodetype = $node->type; 
}
if ($mynodetype == 'blank_page'){?>
  <?php print render($page['highlighted']); ?>
	<?php if ($messages || $page['help']): ?>
    <div id="messages-help-wrapper"><div class="container clearfix">
      <?php print $messages; ?>
      <?php print render($page['help']); ?>
    </div></div>
    <?php endif; ?>
	<?php if (isset($node->path_access_per_role_test) && 
		$node->path_access_per_role_test == 'allow' || !isset($node->path_access_per_role_test)): ?>
      <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
      <header>
        <div id="tasks">
          <?php if ($primary_local_tasks): ?>
            <ul class="tabs primary"><?php print render($primary_local_tasks); ?></ul>
          <?php endif; ?>
          <?php if ($secondary_local_tasks): ?>
            <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
          <?php endif; ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
        </div>
      </header>
      <?php endif; ?>
    <?php endif; ?>
	<div id="content"><?php print render($page['content']);?></div>


<?php }else if ($mynodetype == 'newsletter'){
	//include inline styles for wrapping and other junk for emailing the HTML.?>
	
    <?php if($page['header']): ?>
        <div id="header-wrapper" style="background-color:#333333; ">
          <div class="container clearfix">
            <header class="clearfix">
              <?php print render($page['header']); ?>
            </header>
          </div>
        </div>
      <?php endif; ?>
    

      <div id="content-wrapper"><div class="container">
        <div id="columns"><div class="columns-inner clearfix">
          <div id="content-column"><div class="content-inner">
    
          <?php if ($breadcrumb): ?>
            <div id="breadcrumb-wrapper"><div class="container clearfix">
              <section id="breadcrumb" class="clearfix">
                <?php print $breadcrumb; ?>
              </section>
            </div></div>
          <?php endif; ?>
        
          <?php if ($messages || $page['help']): ?>
            <div id="messages-help-wrapper"><div class="container clearfix">
              <?php print $messages; ?>
              <?php print render($page['help']); ?>
            </div></div>
          <?php endif; ?>
    
    
            <?php print render($page['highlighted']); ?>
    
            <?php $tag = $title ? 'section' : 'div'; ?>
            <<?php print $tag; ?> id="main-content">
    
              <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                <header>
                  <?php print render($title_prefix); ?>
                  <?php if ($title):  
                    //print MENU_VISIBLE_IN_TREE;
                    if (!MENU_VISIBLE_IN_TREE) {
                        print "<h1 id='page-title'>" . $title . "</h1>";
                    } else {
                        if (count(menu_get_active_trail()) == 3 && MENU_VISIBLE_IN_TREE) {
                            print "<h1 id='page-title' style='display:none;'>" . $title . "</h1>";
                        } else {
                            print "<h1 id='page-title'>" . $title . "</h1>";
                        };
                    };
                    endif;
                  ?>
                 
        
        
                  
                  <?php if (isset($node->path_access_per_role_test) && $node->path_access_per_role_test == 'allow' || !isset($node->path_access_per_role_test)): ?>
                      <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                        <div id="tasks">
                          <?php if ($primary_local_tasks): ?>
                            <ul class="tabs primary"><?php print render($primary_local_tasks); ?></ul>
                          <?php endif; ?>
                          <?php if ($secondary_local_tasks): ?>
                            <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
                          <?php endif; ?>
                          <?php if ($action_links): ?>
                            <ul class="action-links"><?php print render($action_links); ?></ul>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                  <?php endif; ?>
                </header>
              <?php endif; ?>
                <div id="content"><?php print render($page['content']);?></div>
                <div class="container clearfix header-3col">
                  <div class="three-column flexible" id="content_3columnMcWidget-column1"><?php print render($page['content_3columnMcWidget-column1']); ?></div>
                  <div class="three-column flexible" id="content_3columnMcWidget-column2"><?php print render($page['content_3columnMcWidget-column2']); ?></div>
                  <div class="three-column flexible" id="content_3columnMcWidget-column3"><?php print render($page['content_3columnMcWidget-column3']); ?></div>
                </div>
                <div class="container clearfix">
                  <div class="two-column flexible" id="content_2column-column1"><?php print render($page['content_2column-column1']); ?></div>
                  <div class="two-column flexible" id="content_2column-column2"><?php print render($page['content_2column-column2']); ?></div>
                </div>
    
    
              <?php print $feed_icons; ?>
    
            </<?php print $tag; ?>>
    
            <?php print render($page['content_aside']); ?>
    
          </div></div>
          <?php print render($page['sidebar_first']); ?>
          <?php print render($page['sidebar_second']); ?>
    
        </div></div>
      </div></div>
    
      <?php if ($page['tertiary_content']): ?>
        <div id="tertiary-content-wrapper"><div class="container clearfix">
          <?php print render($page['tertiary_content']); ?>
        </div></div>
      <?php endif; ?>
    
    
<?php }else{?>
	  <?php //if($page['leaderboard']): ?>
        <div id="global-menu-bar"><div class="container clearfix">
        
          <?php //print render($page['leaderboardSearchMenu']); ?>
          <?php print render($page['global_menu_bar']); ?>
          <?php print render($page['section_menu_bar']); ?>
        </div></div>
        <div id="section-identity"><div class="container clearfix">
          <?php print render($page['section_identity']); ?>
        </div></div>
        <div id="leaderboard-wrapper"><div class="container clearfix">
          <?php //print render($page['leaderboard']); ?>
          <?php //print render($page['leaderboardSearchMenu']); ?>
          <?php //print render($page['leaderboardTopMenu']); ?>
          <?php //print render($page['leaderboardBottomMenu']); ?>
          <?php // print $node; ?>
        </div></div>
      <?php //endif; ?>
    
      <div id="shadow"><div class="container clearfix"></div>
      </div>
      
      <?php if($page['header']): ?>
        <div id="header-wrapper">
          <div class="container clearfix">
            <header class="clearfix">
              <?php print render($page['header']); ?>
            </header>
          </div>
        </div>
      <?php endif; ?>
    
      <?php if ($page['menu_bar'] || $primary_navigation || $secondary_navigation): ?>
        <div id="nav-wrapper"><div class="container clearfix">
          <?php print render($page['menu_bar']); ?>
          <?php if ($primary_navigation): print $primary_navigation; endif; ?>
          <?php if ($secondary_navigation): print $secondary_navigation; endif; ?>
        </div></div>
      <?php endif; ?>
      <?php if ($page['mobile_menu_bar']): ?>
        <div id="mobile-nav-wrapper"><div class="container clearfix">
          <?php print render($page['mobile_menu_bar']); ?>
        </div></div>
      <?php endif; ?>

      <?php print render($page['highlighted']); ?>
      
      <?php if ($breadcrumb): ?>
            <div id="breadcrumb-wrapper"><div class="container clearfix">
              <section id="breadcrumb" class="clearfix">
                <?php print $breadcrumb; ?>
              </section>
            </div></div>
      <?php endif; ?>
      <?php if ($page['secondary_content']): ?>
        <div id="secondary-content-wrapper"><div class="container clearfix">
          <?php print render($page['secondary_content']); ?>
        </div></div>
      <?php endif; ?>
    
      <div id="content-wrapper">
      <!-- /if the page is full width, change the container class to full-width-container --> 
        <?php if (isset ($node->field_body_display['und'][0]['value']) 
          && $node->field_body_display['und'][0]['value'] = "full_width") {?> 
            <div class="full-width-container">
          <?php } else {?>
            <div class="container">
          <?php }?>
        <div id="columns"><div class="columns-inner clearfix">
          <div id="content-column"><div class="content-inner">
    
          
        
          <?php if ($messages || $page['help']): ?>
            <div id="messages-help-wrapper"><div class="container clearfix">
              <?php print $messages; ?>
              <?php print render($page['help']); ?>
            </div></div>
          <?php endif; ?>
    
    
            
    
            <?php $tag = $title ? 'section' : 'div'; ?>
            <<?php print $tag; ?> id="main-content">
    
              <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                <header>
                  <?php print render($title_prefix); ?>
                  <?php if ($title):  
                    //print MENU_VISIBLE_IN_TREE;
                    //if (!MENU_VISIBLE_IN_TREE) {
                    //    print "<h1 id='page-title'>" . $title . "</h1>";
                    //} else {
                    //    if (count(menu_get_active_trail()) <= 3 && MENU_VISIBLE_IN_TREE) {
                    //        print "<h1 id='page-title' style='display:none;'>" . $title . "</h1>";
                    //    } else {
                            print "<h1 id='page-title'>" . $title . "</h1>";
                    //    };
                    //};
                    endif;
                  ?>
                 
        
        
                  
                  <?php if (isset($node->path_access_per_role_test) && $node->path_access_per_role_test == 'allow' || !isset($node->path_access_per_role_test)): ?>
                      <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                        <div id="tasks">
                          <?php if ($primary_local_tasks): ?>
                            <ul class="tabs primary"><?php print render($primary_local_tasks); ?></ul>
                          <?php endif; ?>
                          <?php if ($secondary_local_tasks): ?>
                            <ul class="tabs secondary"><?php print render($secondary_local_tasks); ?></ul>
                          <?php endif; ?>
                          <?php if ($action_links): ?>
                            <ul class="action-links"><?php print render($action_links); ?></ul>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                  <?php endif; ?>
                </header>
              <?php endif; ?>
                <div id="content"><?php print render($page['content']);?></div>
                <div class="container clearfix header-3col">
                  <?php if ($page['content_3columnMcWidget-column1']): ?>
                  <div class="three-column flexible" id="content_3columnMcWidget-column1"><?php print render($page['content_3columnMcWidget-column1']); ?></div>
                  <div class="three-column flexible" id="content_3columnMcWidget-column2"><?php print render($page['content_3columnMcWidget-column2']); ?></div>
                  <div class="three-column flexible" id="content_3columnMcWidget-column3"><?php print render($page['content_3columnMcWidget-column3']); ?></div>
                  <?php endif; ?>
                </div>
                <div class="container clearfix">
                  <?php if ($page['content_2column-column1']): ?>
                  <div class="two-column flexible" id="content_2column-column1"><?php print render($page['content_2column-column1']); ?></div>
                  <div class="two-column flexible" id="content_2column-column2"><?php print render($page['content_2column-column2']); ?></div>
                  <?php endif; ?>
                </div>
    
    
              <?php print $feed_icons; ?>
    
            </<?php print $tag; ?>>
    
            <?php print render($page['content_aside']); ?>
    
          </div></div>
          <?php print render($page['sidebar_first']); ?>
          <?php print render($page['sidebar_second']); ?>
    
        </div></div>
      </div></div>
    
      <?php if ($page['sub-highlighted']): ?>
        <div id="sub-highlighted-content-wrapper"><div class="clearfix">
          <?php print render($page['sub-highlighted']); ?>
        </div></div>
      <?php endif; ?>
    
      <?php if ($page['tertiary_content']): ?>
        <div id="tertiary-content-wrapper"><div class="container clearfix">
          <?php print render($page['tertiary_content']); ?>
        </div></div>
      <?php endif; ?>
    	<div class="footer-bottom-wrapper">
      <?php if ($page['footer']): ?>
        <div id="footer-wrapper">
            <div class="container clearfix" style="text-align:center;">
              <footer class="clearfix">
 <?php print render($page['footer']); ?>
          </footer>
       </div></div>
      <?php endif; ?>
      <?php if ($page['bottom']): ?>
        <div id="bottom">
            <div class="container clearfix" style="text-align:center;">
              <footer class="clearfix">
            <?php print render($page['bottom']); ?>
          </footer>
       </div></div>
      <?php endif; ?>
      </div>
<?php };?>
    </div></div>

<?php

/*
get the nid of an aunt admissions page based on current section using the URL
used in statewide student-services admissions children view
*/
/*
//get the path as an array
$path_parts = explode('/', drupal_get_path_alias($_GET['q']));
//verify there is a path part (like location name) 
if (array_key_exists('0',$path_parts)){
  //set my_path to the location name + /admissions
  $my_path = $path_parts[0] . "/admissions";
  //get the normal drupal path from the aliased path (returns something like node/XXXXX)
  $my_path = drupal_get_normal_path($my_path);
  //convert the normal path to a pathinfo array.
  $my_path = pathinfo($my_path);
  //make sure we have a node ID # as the file name 
  //we only have NID if the page exists. if it doesn't, we get text returned from pathinfo
  //check numeric
  if (is_numeric($my_path['filename'])) {
	//print nid path part
	print $my_path['filename'];  
	//return the path part for a view
	//return $my_path['filename']; 
  } else {
	//or error out.
    print "not found";
  }
}
*/



/*
	//display all variables on the rendered page
	print '<pre>';
	print ; 
	print '</pre>';
*/
?>
