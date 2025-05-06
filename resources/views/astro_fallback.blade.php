<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Frontend - Cargando</title>
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            text-align: center;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        h1 {
            color: #2563eb;
            margin-bottom: 1rem;
        }
        .loader {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #2563eb;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1.5s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        p {
            margin: 1rem 0;
            line-height: 1.5;
        }
        .refresh {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        .refresh:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Iniciando aplicación Astro</h1>
        <div class="loader"></div>
        <p>El servidor Astro se está iniciando. Esto puede tomar unos momentos la primera vez.</p>
        <p>La página se recargará automáticamente en unos instantes.</p>
        <a href="" class="refresh" onclick="window.location.reload(); return false;">Recargar ahora</a>
    </div>
    <script>
        // Auto refresh after 5 seconds
        setTimeout(() => {
            window.location.reload();
        }, 5000);
    </script>
</body>
</html>