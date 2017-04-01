<?php
/**
 * Created by PhpStorm.
 * User: boma1
 * Date: 16.02.2017
 * Time: 16:56
 */

function dp_dike_options_mb($post){

    $dike_data                  = get_post_meta($post->ID, 'dike_data', true);

    if (!$dike_data){
        $dike_data              =   array(
            'testing_period'    =>  '',
            'price'             =>  '',
            'size'              =>  '',
            'rating'            =>  '1star'
        );
    }

    ?>
    <div class="form-group">
        <label for="">Testing Period</label>
        <input type="text" class="table-input" value="<?php echo $dike_data['testing_period'];?>" name="dp_testing period">
    </div>

    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="table-input" value="<?php echo $dike_data['price'];?>" name="dp_price">
    </div>

    <div class="form-group">
        <label for="">Size</label>
        <input type="text" class="table-input" value="<?php echo $dike_data['size'];?>" name="dp_size">
    </div>

    <div class="form-group">
        <label for="">Rating</label>
        <select name="dp_rating" class="rating" id="">
            <option value="1star">1star</option>
            <option value="2stars" <?php echo $dike_data['rating'] == "2stars" ? 'SELECTED' : '';?>>2stars</option>
            <option value="3stars" <?php echo $dike_data['rating'] == "3stars" ? 'SELECTED' : '';?>>3stars</option>
            <option value="4stars" <?php echo $dike_data['rating'] == "4stars" ? 'SELECTED' : '';?>>4stars</option>
            <option value="5stars" <?php echo $dike_data['rating'] == "5stars" ? 'SELECTED' : '';?>>5stars</option>
        </select>
    </div>


<?php
}