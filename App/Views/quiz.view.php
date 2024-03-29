
<?php
    require_once 'head.php';
    require_once 'header.php';
?>

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

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Process form data if necessary
                // For example, perform validation
                $inputField = $_POST["inputField"];
                if (!empty($inputField)) {
                    // Form data is valid, proceed with processing
                    // You can perform database operations, send emails, etc.
                    // Redirect to a success page or display a success message
                    header("Location: success.php");
                    exit(); // Always exit after redirecting to prevent further execution
                } else {
                    // Invalid form data, display error message or redirect to error page
                    header("Location: error.php");
                    exit();
                }
            }
            ?>

            </div>
        </section>


<?php require_once 'footer.php' ?>