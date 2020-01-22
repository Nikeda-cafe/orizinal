<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */
?>

<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	
	<?php if(is_single() ): ?>
		<?php if(!usces_is_item()): ?>
			<div class="entry-meta">
				<span class="date"><time><?php the_date(); ?></time></span>
				<span class="cat"><?php _e("カテゴリー:"); ?> <?php the_category(',') ?></span>
				<?php if( has_tag() ) : ?>
					<span class="tag"><?php the_tags(__('Tags: ')); ?></span>
                    <?php endif ?>
				<span class="author"><?php the_author() ?><?php edit_post_link(__('Edit This')); ?></span>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(__('(more...)')); ?>
	</div><!-- .entry-content -->

</article>