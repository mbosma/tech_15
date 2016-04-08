<?php

/**
 * @file
 * View template for displaying research interests without the H3 tag wrapper
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <?php print $title; ?>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div <?php if ($classes_array[$id]) { print 'class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>