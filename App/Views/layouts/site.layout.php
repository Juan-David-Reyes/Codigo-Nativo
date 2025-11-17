<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Charset y Viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <!-- Título y Descripción -->
    <title>Diseño UX/UI | Código Nativo</title>
    <meta name="description" content="Codigo Nativo - Agencia de diseño web profesional para optimizar tu negocio online. Diseño, desarrollo y mantenimiento web.">
    <meta name="keywords" content="diseño web, desarrollo web, mantenimiento web, SEO, Codigo Nativo">

    <!-- Open Graph / Twitter -->
    <meta property="og:title" content="Codigo Nativo">
    <meta property="og:description" content="Codigo Nativo - Agencia de diseño web profesional para optimizar tu negocio online.">
    <meta property="og:image" content="images/og-image.png">
    <meta property="og:url" content="https://www.codigonativo.com">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Manifest y Theme Color -->
    <link rel="manifest" href="/diseno-ux-ui/manifest.json">
    <meta name="theme-color" content="#0078d4">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URL_PATH ?>Assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URL_PATH ?>Assets/images/favicon/favicon-16x16.png">
    <link rel="shortcut icon" href="<?= URL_PATH ?>Assets/images/favicon/favicon.ico" type="image/x-icon">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= URL_PATH ?>Assets/css/normalize.css">
    <link rel="stylesheet" href="<?= URL_PATH ?>Assets/css/style.min.css">

    <!-- Font Awesome -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    </noscript>

    <!-- Scripts -->
    <script src="<?= URL_PATH ?>Assets/js/main.js" defer></script>
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8DDYN9VZKZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8DDYN9VZKZ');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W6R7NGFS');</script>
    <!-- End Google Tag Manager -->

</head>
    <body>

       <?php require_once(__DIR__ . '/header.view.php'); ?>
       <?php echo $content ?>
       <?php require_once(__DIR__ . '/footer.view.php'); ?>
        
    </body>
</html>