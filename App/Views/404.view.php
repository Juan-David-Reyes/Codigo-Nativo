<?php
// 404.view.php - Página de error 404
http_response_code(404);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=0">
    <title>404 - Página no encontrada</title>
    <style>
        :root{--bg:#f6f8fb;--card:#fff;--muted:#6b7280;--accent:#2563eb}
        *{box-sizing:border-box}
        body{margin:0;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial;background:var(--bg);color:#111;display:flex;align-items:center;justify-content:center;min-height:100vh;padding:24px}
        .card{background:var(--card);padding:36px;max-width:920px;border-radius:12px;box-shadow:0 6px 20px rgba(18,26,38,.08);display:flex;gap:32px;align-items:center;width:100%}
        .illustration{flex:0 0 220px;display:flex;align-items:center;justify-content:center}
        .illustration svg{width:160px;height:160px;display:block}
        .content{flex:1;min-width:0}
        .code{font-size:72px;font-weight:700;color:var(--accent);margin:0 0 8px}
        h1{margin:0;font-size:20px}
        p.lead{margin:8px 0 18px;color:var(--muted)}
        .actions{display:flex;gap:12px;flex-wrap:wrap}
        a.btn{display:inline-flex;align-items:center;gap:8px;padding:10px 14px;border-radius:8px;text-decoration:none;border:1px solid transparent;background:var(--accent);color:#fff;font-weight:600}
        a.btn.secondary{background:transparent;color:var(--accent);border-color:rgba(37,99,235,.12)}
        a.btn:focus{outline:3px solid rgba(37,99,235,.18);outline-offset:2px}
        small.meta{display:block;margin-top:14px;color:var(--muted)}
        @media (max-width:680px){.card{flex-direction:column;text-align:center}.illustration{order:0}}
    </style>
</head>
<body>
    <main role="main" class="card" aria-labelledby="title">
        <div class="illustration" aria-hidden="true">
            <!-- Icono SVG simple -->
            <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect x="6" y="6" width="108" height="108" rx="18" fill="#EFF6FF"/>
                <path d="M36 84c6-10 12-18 24-18s18 8 24 18" stroke="#2563EB" stroke-width="6" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M40 48h40" stroke="#2563EB" stroke-width="6" stroke-linecap="round"/>
                <circle cx="48" cy="36" r="6" fill="#2563EB"/>
                <circle cx="72" cy="36" r="6" fill="#2563EB"/>
            </svg>
        </div>

        <div class="content">
            <div class="code" id="title">404</div>
            <h1>Página no encontrada</h1>
            <p class="lead">Lo sentimos, la página que buscas no existe o fue movida. Verifica la dirección o vuelve al sitio principal.</p>

            <div class="actions" role="group" aria-label="Acciones">
                <a class="btn" href="/" title="Ir al inicio">Ir al inicio</a>
                <a class="btn secondary" href="javascript:history.back()" title="Volver">Volver</a>
                <a class="btn secondary" href="/contacto" title="Contactar">Contacto</a>
            </div>

            <small class="meta">Si crees que debería existir, ponte en contacto con el administrador.</small>
        </div>
    </main>

    <script>
        // Evitar que el botón "Volver" haga nada si no hay historial
        (function(){
            var back = document.querySelector('a[href="javascript:history.back()"]');
            try{
                if (history.length <= 1) back.setAttribute('href','/');
            }catch(e){}
        })();
    </script>
</body>
</html>