<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f6f9; color: #333333; margin: 0; padding: 20px; }
        .card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; border: 1px solid #e1e4e8; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(180deg, #0039C7 0%, #001D64 100%); padding: 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 20px; text-transform: uppercase; letter-spacing: 1px; }
        .content { padding: 30px; line-height: 1.6; }
        .highlight-box { background-color: #f8fafc; border-left: 4px solid #EAB308; padding: 20px; border-radius: 8px; margin: 20px 0; }
        .credentials { font-family: monospace; font-size: 15px; background: #f1f5f9; padding: 15px; border-radius: 8px; margin: 15px 0; }
        .btn-access { display: block; width: fit-content; margin: 30px auto 10px auto; background-color: #EAB308; color: #001B3A; font-weight: bold; text-decoration: none; padding: 12px 30px; border-radius: 10px; text-align: center; text-transform: uppercase; font-size: 14px; }
        .footer { text-align: center; font-size: 12px; color: #64748b; padding: 20px; border-top: 1px solid #f1f5f9; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <img src="{{ asset('images/logo-unach-color.png') }}" alt="Logo UNACH" style="width: 80px; margin-bottom: 10px;">
            <h1>SIRESU - UNACH</h1>
        </div>
        <div class="content">
            <p>Hola, <strong>{{ $user->name }}</strong>,</p>
            <p>Te informamos que se ha creado una cuenta de usuario para que puedas administrar el contenido y publicaciones del departamento asignado.</p>
            
            <div class="highlight-box">
                <strong>Departamento Asignado:</strong><br>
                <span style="font-size: 16px; color: #001D64; font-weight: bold;">
                    {{ $user->departamento ? $user->departamento->nombre : 'Sin departamento asignado' }}
                </span>
            </div>

            <p>Tus credenciales de acceso al panel son las siguientes:</p>
            <div class="credentials">
                <strong>Correo:</strong> {{ $user->email }}<br>
                <strong>Contraseña:</strong> {{ $password }}
            </div>

            <p style="font-size: 12px; color: #e11d48; font-weight: bold;">
                * Por motivos de seguridad, te sugerimos cambiar tu contraseña al iniciar sesión por primera vez.
            </p>

            <a href="{{ url('/admin') }}" class="btn-access">Ingresar al Sistema</a>
        </div>
        <div class="footer">
            Universidad Autónoma de Chiapas<br>
            Secretaría de Identidad y Responsabilidad Social Universitaria
        </div>
    </div>
</body>
</html>
