<?php get_header(); ?>

<?php

    $var0 = ' <div class="carousel-item active" width="300"><img src="';
    $var1 = '<div class="carousel-item"><img src="';
    $var2 = '" class="d-block imagen" style="width:auto; height:500px;" alt="" > </div>';

    $indic0 = '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
    $indic1 = '<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>';


    $output = '';
    $indic = '';
    $contador = 0;

    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_mime_type' => 'image',
        'post_status'    => 'inherit',
        'posts_per_page' => -1,
    );

    $query_images = new WP_Query($query_images_args);

    $images = array();
    foreach ($query_images->posts as $image) {
        $images[] = wp_get_attachment_url($image->ID);
    }

    //..directory within your plugin 
    // $path = __DIR__ . '/images';

    //..continue with your script...
    // $dir_handle = @opendir($path) or die("Cannot open the damn file $path");
    foreach ($images as $entry) {
      
        if ($entry != "." && $entry != ".." && $entry != "retrato.png") {
            if ($contador == 0) {
                $output .= $var0;
                $output .= "$entry";
                $output .= $var2;
                $indic .= "<li id='indicadorB' data-target='#carouselExampleControls' data-slide-to='$contador' class='active'></li>";
            } else {
                $output .= $var1;
                $output .= "$entry";
                $output .= $var2;
                $indic .= "<li id='indicadorB' data-target='#carouselExampleControls' data-slide-to='$contador'></li>";
            }
            $contador++;
        }
    }

    ?>
    <br><br>

    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php echo $indic; ?>
        </ol>
        <div class="carousel-inner">
            <?php echo $output; ?>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span id="indicadorA" class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span id="indicadorA" class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

<?php get_footer(); ?>
