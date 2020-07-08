<?php get_header(); ?>

<div class="container pt-5 pb-5">
    <!-- <h1><?php the_title();?></h1> -->
    <?php if (have_posts()): while(have_posts()) :the_post() ;?>
     
     <?php 
     
        if (get_the_ID()==14){
       the_content();
        echo "<section class='mb-4'>
    <div class='row'>

        <!--Grid column-->
        <div class='col-md-9 mb-md-0 mb-5'>
            <form id='contact-form' name='contact-form' action='mail.php' method='POST'>

                <!--Grid row-->
                <div class='row'>

                    <!--Grid column-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <input type='text' id='name' name='name' class='form-control'>
                            <label for='name' class=''><span class='textcontact'>Your name</span></label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class='col-md-6'>
                        <div class='md-form mb-0'>
                            <input type='text' id='email' name='email' class='form-control'>
                            <label for='email' class=''><span class='textcontact'>Your email</span></label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='md-form mb-0'>
                            <input type='text' id='subject' name='subject' class='form-control'>
                            <label for='subject' class=''><span class='textcontact'>Subject</span></label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class='row'>

                    <!--Grid column-->
                    <div class='col-md-12'>

                        <div class='md-form'>
                            <textarea type='text' id='message' name='message' rows='2' class='form-control md-textarea'></textarea>
                            <label for='message'><span class='textcontact'>Your message</span></label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class='text-center text-md-left'>
                <input type='submit' class='textcontactbutton' onclick='document.getElementById('contact-form').submit();' value='Send' >
            </div>
            <div class='status'></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class='col-md-3 text-center form-control' style='height: 150px; width: 250px;'>
            <ul class='list-unstyled mb-0'>
                <li><i class='fas fa-map-marker-alt fa-2x'></i>
                 <p style='font-weight: bold;'>CONTACT INFO</p>
               </li>
               <li><i class='fas fa-envelope mt-4 fa-2x'></i>
                 <span class='textcontact amarillo' style='font-size: 15px;'>efrengarciaiglesias@gmail.com</span>
              </li>            
              <li><i class='fas fa-map-marker-alt fa-2x'></i>
              <a class='textcontact' href='https://www.facebook.com/efrengarciaiglesias.pintor'>Facebook<a/>
            </li>
            <li><i class='fas fa-map-marker-alt fa-2x'></i>
            <a class='textcontact' href='https://www.instagram.com/efren_pintor/?hl=en'>Instragram<a/>
          </li>
        
        <li><i class='fas fa-phone mt-4 fa-2x'></i>
            <p class='textcontact'>+ 34 234 567 89</p>
        </li>

                
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->";

        }
        else if (get_the_ID()==7){
            echo "<section><div class='row'>";

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

            $output = "";
            $contador = 0;
            
            
            foreach ($images as $entry) {                   
                $contador++;
                $output .= "<div class='column'>
                    <img src='$entry' style='width:100%' onclick='openModal();currentSlide($contador)' class='hover-shadow cursor'>
                    </div>";
                
            }
            
            echo $output;
            
        
        echo "</div>";
        echo "
        <div id='myModal' class='modal'>
        <span class=close cursor onclick=closeModal()>&times;</span>
        <div class=modal-content>";
        
        $output = '';
        $contador = 0;
        foreach ($images as $entry) {  
            $contador++;
            $output .= "<div class='mySlides'>
                <div class='numbertext'>$contador / 4</div>
                <img src='$entry' style='display: block; margin-left: auto; 
                 margin-right: auto;  width: 50%;'>
                </div>";
        }

        echo $output;
        
        echo "
        <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
        <a class='next' onclick='plusSlides(1)'>&#10095;</a>

        <div class='caption-container'>
            <p id='caption'></p>
        </div>";

        $output = "";
        $contador = 0;
        
        foreach ($images as $entry) {  
                    
                    $contador++;
                    $output .= "<div class='column'>
                        <img class='demo cursor' src='$entry' style='width:20%' onclick='currentSlide($contador)' alt='Nature and sunrise'>
                        </div></section>";
        }
                
            }else{
            the_content();
        }
    ?> 
    
<?php endwhile; endif;  ?>

</div>
<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>

<?php get_footer(); ?>