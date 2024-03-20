<?php
    require_once 'includes/head.php';
    require_once 'includes/header.php';
?>
    
    <main>
        <section class="herosection">
            <div class="container">
                <div class="content">
                    <div class="icons">
                        <img class="lazyload" width="50" height="50" src="https://codigonativo.com/wp-content/uploads/2023/06/3d-report-1-1.webp" alt="estadísticas">
                        <img class="lazyload" width="50" height="50" src="https://codigonativo.com/wp-content/uploads/2023/06/favourites-1-1.webp" alt="best rate">
                        <img class="lazyload" width="50" height="50" src="https://codigonativo.com/wp-content/uploads/2023/06/landing-page-1-1.webp" alt="escalable">
                        <img class="lazyload" width="50" height="50" src="https://codigonativo.com/wp-content/uploads/2023/06/stopwatch-1-1.webp" alt="velocidad">
                    </div>
                    <h2 class="title">
                        <span class="t_small">PDF GRATUITO</span> <br> Sistema <span class="green"> Nativo</span>
                    </h2>
                    <h3>Nuestro sistema para <span class="green"> empresas de servicios </span> que quieren atraer <span class="green"> hordas de clientes </span> por internet</h3>
                    <a href="#" class="cta_outline">¡Lo quiero!</a>
                </div>
                <picture class="heroimage">
                    <img class="" width="640" height="838" src="https://codigonativo.com/wp-content/uploads/2023/06/relax.webp" alt="">
                </picture>
            </div>
        </section>


        <?php include 'includes/s-servicios.php' ?>

        
        <section class="">
            <div class="container">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias hic adipisci magni, sunt corporis eius numquam animi odit sed cum obcaecati error delectus explicabo neque, cupiditate provident voluptatem, assumenda necessitatibus.   Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias hic adipisci magni, sunt corporis eius numquam animi odit sed cum obcaecati error delectus explicabo neque, cupiditate provident voluptatem, assumenda necessitatibus.
            </div>
        </section>
        <section class="fullwidth">
            <div class="container">
                <div class="content">
                    <h2>¡No pierdas más tiempo!</h2>
                    <div>Ponte en contacto con nosotros hoy mismo y descubre cómo podemos diseñar una página web que ayude a tu negocio a crecer. ¡Te esperamos!</div>
                    <a class="cta" href="#">¡Contáctanos ahora!</a>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
            <h1>Juego de Quiz</h1>
            <form action="resultado.php" method="post">
                <p>Pregunta 1: ¿Cuál es tu color favorito?</p>
                <input type="radio" name="pregunta1" value="1"> Rojo<br>
                <input type="radio" name="pregunta1" value="2"> Azul<br>
                <input type="radio" name="pregunta1" value="3"> Verde<br>

                <p>Pregunta 2: ¿Cuál es tu animal favorito?</p>
                <input type="radio" name="pregunta2" value="1"> Perro<br>
                <input type="radio" name="pregunta2" value="2"> Gato<br>
                <input type="radio" name="pregunta2" value="3"> Pájaro<br>

                <p>Pregunta 3: ¿Cuál es tu animal favorito?</p>
                <input type="radio" name="pregunta3" value="1"> Perro<br>
                <input type="radio" name="pregunta3" value="2"> Gato<br>
                <input type="radio" name="pregunta3" value="3"> Pájaro<br>

                <input type="submit" value="Obtener resultado">
            </form>

            <?php
                // Recibe las respuestas del formulario y suma los puntos
                $puntos = 0;
                if (isset($_POST['pregunta1']) && isset($_POST['pregunta2']) && isset($_POST['pregunta3']) ) {
                    $puntos += intval($_POST['pregunta1']) + intval($_POST['pregunta2']) + intval($_POST['pregunta3']);
                }

                // Determina el resultado basado en la puntuación
                $resultado = '';
                if ($puntos <= 4) {
                    $resultado = "Resultado 1";
                } elseif ($puntos <= 8) {
                    $resultado = "Resultado 2";
                } else {
                    $resultado = "Resultado 3";
                }

                // Muestra el resultado
                echo "<h2>Tu resultado:</h2>";
                echo "<p>$resultado</p>";
            ?>

            </div>
        </section>



    </main>




<?php require_once 'includes/footer.php' ?>