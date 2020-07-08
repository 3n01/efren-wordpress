<h1>hola soy lightbox</h1>
<div class="row">
    <?php
    $output = "";
    $contador = 0;
    if ($handle = opendir('images')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != ".." && $entry != "retrato.png" && false === strpos($entry, 'IMG')) {
                $imagen = "images/" . "$entry";
                $contador++;
                $output .= "<div class='column'>
                    <img src=' $imagen' style='width:100%' onclick='openModal();currentSlide($contador)' class='hover-shadow cursor'>
                    </div>";
            }
        }
    }
    echo $output;
    ?>

</div>

<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <?php
        $output = '';
        $contador = 0;
        if ($handle = opendir('images')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry != "retrato.png") {
                    $imagen = "images/" . "$entry";
                    $contador++;
                    $output .= "<div class='mySlides'>
                        <div class='numbertext'>$contador/ 4</div>
                        <img src='$imagen' class='center'>
                        </div>";
                }
            }
        }
        echo $output;
        ?>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <?php
        $output = "";
        $contador = 0;
        if ($handle = opendir('images')) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && $entry != "retrato.png") {
                    $imagen = "images/" . "$entry";
                    $contador++;
                    $output .= "<div class='column'>
                        <img class='demo cursor' src='$imagen' style='width:100%' onclick='currentSlide($contador)' alt='Nature and sunrise'>
                        </div>";
                }
            }
        }
        //echo $output;
        ?>
    </div>
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