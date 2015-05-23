<?php
/**
 * @package		Noxidsoft.Site
 * @subpackage	mod_myarticles
 * @copyright	Copyright (C) 2007 - 2014 Noxidsoft. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$base = JURI::Base();
$user = JFactory::getUser();
?>

<div class="myarticles<?php echo $moduleclass_sfx; ?>">

	<div class="accordion" id="myarticles">

	  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#myarticles" href="#collapseOne">
	        <i class="icon-star"></i> Featured <span class="pull-right"><?php $c=0; for ($i=0;$i<count($list);$i++) { if($list[$i]->featured != 0) { $c++; } } echo $c; ?></span>
	      </a>
	    </div>
	    <div id="collapseOne" class="accordion-body collapse">
	      <div class="accordion-inner">

					  <?php foreach ($list as $item) {
					    //print_r($item);
					    if ($item->featured==1) {
				        if ($item->link) {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<a href="'.$item->link.'">';
				              if ($item->checked_out) {
				                echo '<i class="icon-lock"></i> ';
				              }
				              echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'</a><br />';
				          }
				        } else {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'<br />';
				          }
				        }
					    }
					  } ?>

	      </div>
	    </div>
	  </div>

	  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#myarticles" href="#collapseTwo">
	        <i class="icon-ok"></i> Published <span class="pull-right"><?php $c=0; for ($i=0;$i<count($list);$i++) { if($list[$i]->state == 1) { $c++; } } echo $c; ?></span>
	      </a>
	    </div>
	    <div id="collapseTwo" class="accordion-body collapse">
	      <div class="accordion-inner">

					  <?php foreach ($list as $item) {
					    //print_r($item);
					    if ($item->state==1 && $item->featured!=1) {
				        if ($item->link) {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<a href="'.$item->link.'">';
				              if ($item->checked_out) {
				                echo '<i class="icon-lock"></i> ';
				              }
				              echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'</a><br />';
				          }
				        } else {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'<br />';
				          }
				        }
					    }
					  } ?>

	      </div>
	    </div>
	  </div>

	  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#myarticles" href="#collapseThree">
	        <i class="icon-remove-circle"></i> Un-Published <span class="pull-right"><?php $c=0; for ($i=0;$i<count($list);$i++) { if($list[$i]->state == 0) { $c++; } } echo $c; ?></span>
	      </a>
	    </div>
	    <div id="collapseThree" class="accordion-body collapse">
	      <div class="accordion-inner">

					  <?php foreach ($list as $item) {
					    //print_r($item);
					    if ($item->state==0 && $item->featured!=1) {
				        if ($item->link) {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<a href="'.$item->link.'">';
				              if ($item->checked_out) {
				                echo '<i class="icon-lock"></i> ';
				              }
				              echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'</a><br />';
				          }
				        } else {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'<br />';
				          }
				        }
					    }
					  } ?>

	      </div>
	    </div>
	  </div>

	  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#myarticles" href="#collapseFour">
	        <i class="icon-inbox"></i> Archived <span class="pull-right"><?php $c=0; for ($i=0;$i<count($list);$i++) { if($list[$i]->state == 2) { $c++; } } echo $c; ?></span>
	      </a>
	    </div>
	    <div id="collapseFour" class="accordion-body collapse">
	      <div class="accordion-inner">

					  <?php foreach ($list as $item) {
					    //print_r($item);
					    if ($item->state==2 && $item->featured!=1) {
				        if ($item->link) {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<a href="'.$item->link.'">';
				              if ($item->checked_out) {
				                echo '<i class="icon-lock"></i> ';
				              }
				              echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'</a><br />';
				          }
				        } else {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'<br />';
				          }
				        }
					    }
					  } ?>

	      </div>
	    </div>
	  </div>

	  <div class="accordion-group">
	    <div class="accordion-heading">
	      <a class="accordion-toggle" data-toggle="collapse" data-parent="#myarticles" href="#collapseFive">
	        <i class="icon-trash"></i> Trashed <span class="pull-right"><?php $c=0; for ($i=0;$i<count($list);$i++) { if($list[$i]->state == -2) { $c++; } } echo $c; ?></span>
	      </a>
	    </div>
	    <div id="collapseFive" class="accordion-body collapse">
	      <div class="accordion-inner">

					  <?php foreach ($list as $item) {
					    //print_r($item);
					    if ($item->state==-2 && $item->featured!=1) {
				        if ($item->link) {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<a href="'.$item->link.'">';
				              if ($item->checked_out) {
				                echo '<i class="icon-lock"></i> ';
				              }
				              echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'</a><br />';
				          }
				        } else {
				          if ($user->authorise('core.edit', 'com_content.article.'.$item->id)) {
				            echo '<i class="icon-chevron-right"></i> '.htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8').'<br />';
				          }
				        }
					    }
					  } ?>

	      </div>
	    </div>
	  </div>

	</div>

</div>
