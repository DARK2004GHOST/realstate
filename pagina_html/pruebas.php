<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Carousel</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .carousel-item img {
      width: auto;
      max-height: 600px;
      display: block;
      margin: 0 auto;
      cursor: pointer;
      position: relative; /* Añade posición relativa */
    }
    .carousel-container {
      position: relative;
    }
    .carousel-control-prev,
    .carousel-control-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 9999;
      color: #fff;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    }
    .carousel-control-prev {
      left: 10px;
    }
    .carousel-control-next {
      right: 10px;
    }
  </style>
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../imagenes/carrusel/imagencarrusel1.jpg" class="d-block w-100" alt="...">
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="carousel-item">
      <img src="../imagenes/carrusel/imagencarrusel2.jpg" class="d-block w-100" alt="...">
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="carousel-item">
      <img src="../imagenes/carrusel/imagencarrusel3.jpg" class="d-block w-100" alt="...">
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- JavaScript para mostrar imagen en pantalla completa -->
<script>
  $(document).ready(function(){
    $('.carousel-item img').click(function(){
      $('#exampleModal img').attr('src', $(this).attr('src'));
      $('#exampleModal').modal('show');
    });
    
    $('#exampleModal').on('show.bs.modal', function () {
      var $image = $(this).find('img');
      var images = $('#carouselExampleIndicators .carousel-inner .carousel-item img');
      var currentIndex = images.index($image);
      
      $(document).on('keydown', function(e) {
        if (e.which === 37) { // Left arrow key
          currentIndex = (currentIndex - 1 + images.length) % images.length;
          $image.attr('src', images.eq(currentIndex).attr('src'));
        } else if (e.which === 39) { // Right arrow key
          currentIndex = (currentIndex + 1) % images.length;
          $image.attr('src', images.eq(currentIndex).attr('src'));
        }
      });
      
      // Controladores de eventos para las flechas dentro del modal
      $('#exampleModal .carousel-control-prev').click(function(){
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        $image.attr('src', images.eq(currentIndex).attr('src'));
      });
      
      $('#exampleModal .carousel-control-next').click(function(){
        currentIndex = (currentIndex + 1) % images.length;
        $image.attr('src', images.eq(currentIndex).attr('src'));
      });
    });
  });
</script>

<!-- Modal para pantalla completa -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <a class="carousel-control-prev" href="#" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <img src="" class="d-block w-100" alt="">
        <a class="carousel-control-next" href="#" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</div>

</body>
</html>
