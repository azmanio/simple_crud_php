<?php
include "scripts/config.php";
include "includes/header.php";
include "includes/footer.php";
?>

<div class="card">
    <div class="card-body">
        <h1 class="text-center">Selamat Datang di Website Penyewaan Mobil PT JEKUY</h1>
        <div id="carouselJekuy" class="carousel slide my-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselJekuy" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselJekuy" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselJekuy" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="3000">
                    <img src="assets/image1.jpg" class="rounded mx-auto d-block w-50" alt="Gambar 1">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="assets/image2.jpg" class="rounded mx-auto d-block w-50" alt="Gambar 2">
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                    <img src="assets/image3.jpg" class="rounded mx-auto d-block w-50" alt="Gambar 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselJekuy" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselJekuy" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div> 
</div>

