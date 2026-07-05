<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sitio en Mantenimiento - SIRESU</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            color: #001B3A;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            max-width: 450px;
            width: 100%;
            text-align: center;
            background: #ffffff;
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            border: 1px solid #f3f4f6;
            box-sizing: border-box;
        }
        .error-code {
            font-size: 120px;
            font-weight: 900;
            color: #001B3A;
            line-height: 1;
            margin: 0;
            letter-spacing: 0.05em;
            position: relative;
        }
        .circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border: 4px solid rgba(234, 179, 8, 0.3);
            border-radius: 50%;
            pointer-events: none;
        }
        h1 {
            font-size: 24px;
            font-weight: 700;
            color: #001D64;
            margin: 24px 0 12px 0;
        }
        p {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.6;
            margin: 0 0 24px 0;
        }
        .badge {
            display: inline-block;
            background-color: rgba(234, 179, 8, 0.1);
            color: #d97706;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 6px 16px;
            border-radius: 9999px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="position: relative; display: inline-block; width: 100%;">
            <div class="error-code">503</div>
            <div class="circle"></div>
        </div>
        <h1>Mantenimiento Programado</h1>
        <div class="badge">Temporalmente fuera de línea</div>
        <p>Estamos realizando mejoras en nuestra plataforma institucional para brindarte un mejor servicio. Volveremos a estar en línea muy pronto.</p>
    </div>
</body>
</html>
