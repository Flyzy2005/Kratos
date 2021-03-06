<?php
/**
 * The main template file
 *
 * @package Vtrois
 * @version 2.3
 */

get_header();
get_header( 'banner' ); ?>
<div id="kratos-blog-post" style="background:<?php echo kratos_option( 'background_index_color' ); ?>">
    <div class="container">
        <div class="row">
            <section id="main" class="col-md-8">
				<?php
				if ( is_home() ) {
					if ( kratos_option( 'top_post' ) == 1 ) :
						kratos_banner();
					endif;
				} elseif ( is_category() ) {
					if ( kratos_option( 'top_post' ) == 1 ) :
						kratos_banner();
					endif;
					?>
					<?php if ( kratos_option( 'show_head_cat' ) ) : ?>
                        <div class="kratos-hentry clearfix">
                            <h1 class="kratos-post-header-title">分类：<?php echo single_cat_title( '', false ); ?></h1>
                            <h1 class="kratos-post-header-title"><?php echo category_description(); ?></h1>
                        </div>
					<?php endif; ?>
					<?php
				} elseif ( is_tag() ) {
					if ( kratos_option( 'top_post' ) == 1 ) :
						kratos_banner();
					endif;
					?>
					<?php if ( kratos_option( 'show_head_tag' ) ) : ?>
                        <div class="kratos-hentry clearfix">
                            <h1 class="kratos-post-header-title">标签：<?php echo single_cat_title( '', false ); ?></h1>
                            <h1 class="kratos-post-header-title"><?php echo category_description(); ?></h1>
                        </div>
					<?php endif; ?>
					<?php
				} elseif ( is_search() ) {
					if ( kratos_option( 'top_post' ) == 1 ) :
						kratos_banner();
					endif;
					?>
                    <div class="kratos-hentry clearfix">
                        <h1 class="kratos-post-header-title">搜索结果：<?php the_search_query(); ?></h1>
                    </div>
					<?php
				}
				?>
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						get_template_part( 'content', get_post_format() );
					}
				} else {
					?>
                    <div class="kratos-hentry clearfix">
                        <h1 class="kratos-post-header-title">很抱歉，没有找到任何内容。</h1>
                    </div>
				<?php } ?>

				<?php kratos_pages( 3 ); ?>
				<?php wp_reset_query(); ?>
            </section>
            <aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
				<?php dynamic_sidebar( 'sidebar_tool' ); ?>
            </aside>
        </div>
    </div>
</div>
<?php get_footer(); ?>
