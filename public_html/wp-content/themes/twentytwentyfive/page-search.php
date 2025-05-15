<?php
get_header('header.php');
?>

<main>
    <section class="banner_page relative"
             style="background-image: url(https://thenelson.vn/assets/images/banner-page.png)">
        <div class="banner_logo"><img src="https://thenelson.vn/assets/images/banner-logo.png" alt=""></div>
        <div class="banner_page_text font-600 text-white text-uppercase text-center">Search</div>
    </section>
    <section class="news">
        <div class="news_list pd-60">
            <div class="container">
                <?php
                // Get search parameters
                $keyword = isset($_GET['q']) ? sanitize_text_field($_GET['q']) : '';
                $paged = isset($_GET['page_num']) ? sanitize_text_field($_GET['page_num']) : 1;
                if ($keyword) {
                    $args = [
                        's' => $keyword,
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged,
                    ];
                    $search_query = new WP_Query($args);

                    echo '<div class="font-size-30 fw-bold text-uppercase mgb-30"><h2>Search results for: "' . esc_html($keyword) . '"</h2></div>';
                    echo '<div class="row">';

                    if ($search_query->have_posts()) :
                        while ($search_query->have_posts()) : $search_query->the_post(); ?>
                            <div class="col-md-4">
                                <div class="news_item">
                                    <a href="<?php the_permalink(); ?>"
                                       class="zoom-img d-block">
                            <span>
                                <?php
                                if (has_post_thumbnail()) {
                                    echo '<img src="' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')) . '" alt="'.get_the_title().'">';
                                }
                                ?>
                            </span>
                                    </a>
                                    <h4>
                                        <a href="<?php the_permalink(); ?>"
                                           title="<?php the_title(); ?>"
                                           class="font-size-18 fw-bold text-uppercase"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a>
                                    </h4>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                    <a href="<?php the_permalink(); ?>"
                                       title="<?php the_title(); ?>"
                                       class="see">Xem thêm</a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No results found.</p>';
                    endif;
                    echo '</div>'; // Close row div

                    // Only show pagination if we have results
                    if ($search_query->max_num_pages > 1) : ?>
                        <ul class="pagi flex-center-center">
                            <?php
                            // Build the pagination base URL with the search term included
                            $base_url = add_query_arg('q', urlencode($keyword), home_url('/search'));

                            $pages = paginate_links([
                                'base'      => $base_url . '&page_num=%#%',
                                'format'    => '',
                                'current'   => $paged,
                                'total'     => $search_query->max_num_pages,
                                'type'      => 'array',
                                'prev_text' => '<i class="fal fa-arrow-left" aria-hidden="true"></i>',
                                'next_text' => '<i class="fal fa-arrow-right" aria-hidden="true"></i>',
                            ]);

                            if (is_array($pages)) {
                                foreach ($pages as $page) {
                                    if (strpos($page, 'current') !== false) {
                                        echo '<li class="active"><span>' . strip_tags($page) . '</span></li>';
                                    } else {
                                        echo '<li>' . $page . '</li>';
                                     }
                                }
                            }
                            ?>
                        </ul>
                    <?php endif;
                }
                ?>
        </div>
    </section>
</main>
<?php
get_footer('footer.php');
?>
