<?php include("template/header.php"); ?>

<!--Slideshow-->
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="source\home-1.png" class="img" />
        <div class="text">
            Especialistas en insumos y equipos para laboratorio e industria
            farmacéutica, biotecnológica, médica y veterinaria
        </div>
    </div>

    <div class="mySlides fade">
        <img src="source\home-2.png" class="img" />
        <div class="text">
            Priorizamos la total satisfacción de nuestros clientes, con un
            servicio personalizado, permanente y flexible
        </div>
    </div>

    <div class="mySlides fade">
        <img src="source\home-3.png" class="img" />
        <div class="text">
            Todos nuestros procesos estan certificados bajo normas ISO
        </div>
    </div>
</div>
<br />

<div style="text-align: center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
    }
</script>



<?php include("template/footer.php"); ?>