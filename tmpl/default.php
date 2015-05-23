<?php
/**
 * @package		Noxidsoft.Site
 * @subpackage	mod_myarticles
 * @copyright	Copyright (C) 2007 - 2013 Noxidsoft. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$base = JURI::Base();
$user = JFactory::getUser();
?>
<style>
span.checkedoutcustom {
background-image: url("<?php echo $base; ?>modules/mod_myarticles/assets/images/checked_out.png");
display: inline-block;
height: 16px;
width: 16px;
}
span.featuredcustom {
background-image: url("<?php echo $base; ?>modules/mod_myarticles/assets/images/featured.png");
display: inline-block;
height: 16px;
width: 16px;
}
span.publishedcustom {
background-image: url("<?php echo $base; ?>modules/mod_myarticles/assets/images/publish_g.png");
display: inline-block;
height: 16px;
width: 16px;
}
span.unpublishedcustom {
background-image: url("<?php echo $base; ?>modules/mod_myarticles/assets/images/publish_x.png");
display: inline-block;
height: 16px;
width: 16px;
}
span.archivedcustom {
background-image: url("<?php echo $base; ?>modules/mod_myarticles/assets/images/icon-16-archive.png");
display: inline-block;
height: 16px;
width: 16px;
}
span.trashedcustom {
background-image: url("<?php echo $base; ?>modules/mod_myarticles/assets/images/icon-16-trash.png");
display: inline-block;
height: 16px;
width: 16px;
}
li.list-title-custom {
list-style-type:none;
border-top:1px solid <?php echo $subheading_line_color; ?>;
border-bottom:1px dashed <?php echo $subheading_line_color; ?>;
margin-top:10px;
padding-top:3px;
font-size:1.1em;
font-style:italic;
}
</style>

<ul class="mostread<?php echo $moduleclass_sfx; ?>">
	<li class="list-title-custom"><span title="Featured items that you own!" class="featuredcustom"></span> Featured</li>
	<?php foreach ($list as $item) : ?>
		<?php //print_r($item); ?>
		<?php if ($item->featured==1) :?>
			<li>
				<?php if ($item->link) :?>
					<?php if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){ ?>
						<a href="<?php echo $item->link; ?>">
							<?php if ($item->checked_out) : ?>
								<span title="Checked out" class="checkedoutcustom"></span>
							<?php endif; ?>
							<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></a>
					<?php } ?>
				<?php else :
					if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){
						echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
					}
				endif; ?>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<li class="list-title-custom"><span title="Published items that you own!" class="publishedcustom"></span> Published</li>
	<?php foreach ($list as $item) : ?>
		<?php //print_r($item); ?>
		<?php if ($item->state==1 && $item->featured!=1) :?>
			<li>
				<?php if ($item->link) :?>
					<?php if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){ ?>
						<a href="<?php echo $item->link; ?>">
							<?php if ($item->checked_out) : ?>
								<span title="Checked out" class="checkedoutcustom"></span>
							<?php endif; ?>
							<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></a>
					<?php } ?>
				<?php else :
					if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){	
						echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
					}
				endif; ?>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<li class="list-title-custom"><span title="Unpublished items that you own!" class="unpublishedcustom"></span> Un-Published</li>
	<?php foreach ($list as $item) : ?>
		<?php //print_r($item); ?>
		<?php if ($item->state==0 && $item->featured!=1) :?>
			<li>
				<?php if ($item->link) :?>
					<?php if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){ ?>
						<a href="<?php echo $item->link; ?>">
							<?php if ($item->checked_out) : ?>
								<span title="Checked out" class="checkedoutcustom"></span>
							<?php endif; ?>
							<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></a>
					<?php } ?>
				<?php else :
					if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){
						echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
					}
				endif; ?>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<li class="list-title-custom"><span title="Archived items that you own!" class="archivedcustom"></span> Archived</li>
	<?php foreach ($list as $item) : ?>
		<?php //print_r($item); ?>
		<?php if ($item->state==2 && $item->featured!=1) :?>
			<li>
				<?php if ($item->link) :?>
					<?php if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){ ?>
						<a href="<?php echo $item->link; ?>">
							<?php if ($item->checked_out) : ?>
								<span title="Checked out" class="checkedoutcustom"></span>
							<?php endif; ?>
							<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></a>
					<?php } ?>
				<?php else :
					if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){	
						echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
					}
				endif; ?>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
	
	<li class="list-title-custom"><span title="Trashed items that you own!" class="trashedcustom"></span> Trashed</li>
	<?php foreach ($list as $item) : ?>
		<?php //print_r($item); ?>
		<?php if ($item->state==-2 && $item->featured!=1) :?>
			<li>
				<?php if ($item->link) :?>
					<?php if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){ ?>
						<a href="<?php echo $item->link; ?>">
							<?php if ($item->checked_out) : ?>
								<span title="Checked out" class="checkedoutcustom"></span>
							<?php endif; ?>
							<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?></a>
					<?php } ?>
				<?php else :
					if ($user->authorise('core.edit', 'com_content.article.'.$item->id)){
						echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8');
					}
				endif; ?>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>



