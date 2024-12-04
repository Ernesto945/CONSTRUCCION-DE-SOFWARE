<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña Incorrecta</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error-message {
            background-color: #ffcccb;
            color: #ff0000;
            border: 2px solid #ff0000;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error-message h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .error-message a {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
        }

        .error-message a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="error-message">
        <h2>¡Contraseña Incorrecta! Vuelve a intentarlo.</h2>
        <a href="index.php">Volver atrás</a>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = 'index.php'; // Redirige al login después de 3 segundos
        }, 3000);
    </script>
</body>

</html>
