<section class="home-hero gradient-bg">
  
    <div class="gradients-container">
      <div class="g1"></div>
      <div class="g2"></div>
      <div class="g3"></div>
      <div class="g4"></div>
      <div class="g5"></div>
    </div>

  <div class="content_cont">
    <h1>A place to develope your @proyect</h1>
    <div class="proyects">
      <div class="card">
        <img src="<?= URL_PATH ?>Assets/images/imagen.jpg" width="500" height="500" alt="">
      </div>
      <div class="card">
        <img src="<?= URL_PATH ?>Assets/images/imagen.jpg" width="500" height="500" alt="">
      </div>
      <div class="card">
        <img src="<?= URL_PATH ?>Assets/images/imagen.jpg" width="500" height="500" alt="">
      </div>
      <div class="card">
        <img src="<?= URL_PATH ?>Assets/images/imagen.jpg" width="500" height="500" alt="">
      </div>
      <div class="card">
        <img src="<?= URL_PATH ?>Assets/images/imagen.jpg" width="500" height="500" alt="">
      </div>
      <div class="card">
        <img src="<?= URL_PATH ?>Assets/images/imagen.jpg" width="500" height="500" alt="">
      </div>
    </div>

    <div class="desc-hero">
      <p>Diseñamos pensando en la experiencia que va a llevar a tus visitantes a elegirte por encima de la competencia.</p>

      <div class="ctas">
        <a href="" class="cta-green">Nuestros servicios</a>
        <a href="" class="cta">Nuestros servicios</a>
      </div>
    </div>
  </div>
</section>

<section class="slider-brands">

<h2>Quienes nos han confiado sus proyectos</h2>
<div class="slider">
  <ul class="move">
    <!-- // primera vuelta -->
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/advancederma.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/apsap.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/bbmaya.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/ccsolutions.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/danielpsy.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/mielato.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/nacionpodcast.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/paolaakl.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/pazdesdeelvientre.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/seonme.png" alt=""></li>

    <!-- //segunda vuelta -->

    <li class="box"><img width="120" height="60" src="/Assets/images/brands/advancederma.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/apsap.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/bbmaya.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/ccsolutions.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/danielpsy.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/mielato.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/nacionpodcast.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/paolaakl.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/pazdesdeelvientre.png" alt=""></li>
    <li class="box"><img width="120" height="60" src="/Assets/images/brands/seonme.png" alt=""></li>
  </ul>
</div>

<script type="module">

  document.addEventListener('DOMContentLoaded', () => {
    const interBubble = document.querySelector<HTMLDivElement>('.interactive')!;
    let curX = 0;
    let curY = 0;
    let tgX = 0;
    let tgY = 0;

    function move() {
        curX += (tgX - curX) / 20;
        curY += (tgY - curY) / 20;
        interBubble.style.transform = `translate(${Math.round(curX)}px, ${Math.round(curY)}px)`;
        requestAnimationFrame(() => {
            move();
        });
    }

    window.addEventListener('mousemove', (event) => {
        tgX = event.clientX;
        tgY = event.clientY;
    });

    move();
});

</script>

</section>