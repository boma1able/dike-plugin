<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 24.02.2017
 * Time: 11:25
 */

function dp_add_dashboard_widget(){
    wp_add_dashboard_widget(
        'latest_posts',
        'Latest posts',
        'dp_latest_dike_posts_display'
    );
}

function dp_latest_dike_posts_display(){
    global $wpdb;

    $latest_posts           =   $wpdb->get_results(
        "SELECT * FROM '" . $wpdb->prefix . "dike-plugin' ORDER BY `id` DESC LIMIT 5"
    );

    echo '<ul>';

    foreach($latest_posts as $rating){
        $title                  =   get_the_title($ratin->$post_id);
        $permalink              =   get_the_permalink($rating->post_id);
        ?>
        <li>
            <a href="<?php echo $permalink; ?>"><?php echo $title;?></a>received a rating of <?php echo $rating->rating; ?>
        </li>

        <?php
    }

    echo '</ul>';

}