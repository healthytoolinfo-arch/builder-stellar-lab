<?php
// Configuración para el manejo del formulario de contacto
$success = false;
$error = false;

if ($_POST) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // Validación básica
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Configurar el email
        $to = "hello@imsolutions.studio";
        $subject = "Nuevo mensaje de contacto desde la web - " . $name;
        
        $email_body = "Nuevo mensaje de contacto:\n\n";
        $email_body .= "Nombre: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Fecha: " . date('d/m/Y H:i:s') . "\n\n";
        $email_body .= "Mensaje:\n" . $message . "\n";
        
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // Enviar el email
        if (mail($to, $subject, $email_body, $headers)) {
            $success = true;
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto | i'm solutions</title>
    <meta name="description" content="Contacta con el equipo de i'm solutions para más información o colaboraciones." />
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gill+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Gill Sans', -apple-system, Roboto, Helvetica, sans-serif;
            background-color: #FFFFFC;
            color: #1D1D1B;
            line-height: 1.6;
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 16px;
        }

        /* Header styles similar to main page */
        header {
            position: sticky;
            top: 0;
            background-color: #FFFFFC;
            z-index: 1000;
            padding: 16px 0;
            border-bottom: 1px solid transparent;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo svg {
            width: 128px;
            height: auto;
        }

        nav {
            display: flex;
            gap: 32px;
        }

        nav a {
            font-family: 'Gill Sans', sans-serif;
            font-size: 18px;
            color: #1D1D1B;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        nav a:hover {
            opacity: 0.7;
        }

        /* Main content */
        main {
            padding: 64px 0;
            min-height: 60vh;
        }

        h1 {
            font-family: 'Gill Sans', sans-serif;
            font-weight: bold;
            font-size: 48px;
            text-align: center;
            margin-bottom: 48px;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 16px 24px;
            border: 1px solid #1D1D1B;
            border-radius: 8px;
            background: white;
            font-family: 'Inter', sans-serif;
            font-size: 16px;
            color: #666;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            box-shadow: 0 0 0 2px #1D1D1B;
        }

        .form-group textarea {
            resize: none;
            height: 120px;
        }

        .submit-btn {
            width: 100%;
            padding: 16px 32px;
            background-color: #1D1D1B;
            color: white;
            border: none;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background-color: #333;
            transform: scale(1.02);
        }

        /* Success and error messages */
        .message {
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 32px;
            text-align: center;
        }

        .success {
            background-color: #f0f9ff;
            border: 1px solid #3b82f6;
            color: #1e40af;
        }

        .error {
            background-color: #fef2f2;
            border: 1px solid #ef4444;
            color: #dc2626;
        }

        /* Footer */
        footer {
            background-color: #1D1D1B;
            color: white;
            padding: 32px 0;
            text-align: center;
        }

        .back-link {
            display: inline-block;
            margin-top: 32px;
            padding: 12px 24px;
            background-color: transparent;
            border: 2px solid #1D1D1B;
            color: #1D1D1B;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .back-link:hover {
            background-color: #1D1D1B;
            color: white;
        }

        @media (min-width: 1024px) {
            .container {
                padding: 0 64px;
            }

            h1 {
                font-size: 72px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.html">
                        <svg width="128" height="103" viewBox="0 0 168 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clipPath="url(#clip0_1_5)">
                                <path d="M9.28546 3.26505C11.8223 3.26505 14.0036 4.17797 15.8294 5.99308C17.6553 7.81356 18.5655 9.98846 18.5655 12.5178C18.5655 15.0471 17.6661 17.1254 15.8618 19.0103C14.0575 20.9006 11.8653 21.8404 9.28007 21.8404C6.69479 21.8404 4.6158 20.8952 2.7684 19.0103C0.921005 17.1308 0 14.9612 0 12.5232C0 9.95087 0.937163 7.75985 2.8061 5.96086C4.67504 4.16186 6.83483 3.26505 9.28546 3.26505ZM17.4991 32.0383V94.246H1.06643V32.0383H17.4991Z" fill="#1D1D1B"/>
                                <path d="M42.684 0C46.2442 0 49.0987 1.32105 51.2316 3.96316C53.3698 6.60527 54.4363 10.1012 54.4363 14.4511C54.4363 20.3099 52.465 25.5189 48.5224 30.0674C44.5799 34.6213 39.7594 37.3171 34.061 38.1602V34.632C38.3375 31.034 40.4758 26.3513 40.4758 20.5784L40.3411 18.5162C35.3106 17.5818 32.7899 14.5423 32.7899 9.39238C32.7899 6.77175 33.7379 4.55388 35.6284 2.7334C37.5189 0.912924 39.8725 0.00537014 42.6733 0.00537014L42.684 0Z" fill="#1D1D1B"/>
                                <path d="M104.273 30.8354C109.083 30.8354 113.144 31.9577 116.461 34.1971C119.779 36.4418 122.262 39.4491 123.91 43.2189C127.427 38.9121 130.934 35.7705 134.429 33.7943C137.925 31.8181 141.765 30.83 145.95 30.83C152.542 30.83 157.864 32.9727 161.914 37.258C165.964 41.5434 167.995 47.2626 167.995 54.4103V94.2406H151.562V57.1437C151.562 52.8368 150.636 49.4429 148.788 46.9512C146.941 44.4648 144.259 43.2189 140.736 43.2189C135.706 43.2189 130.874 46.441 126.242 52.8744V94.2353H109.874V56.8698C109.874 52.6059 108.894 49.2657 106.934 46.8438C104.973 44.4218 102.345 43.2135 99.0539 43.2135C96.3824 43.2135 93.9318 43.9815 91.7074 45.512C89.4776 47.0424 87.097 49.4966 84.5601 52.869V94.2299H68.1275V32.0383H84.5601V40.7648C87.544 37.3923 90.5709 34.8952 93.6463 33.2734C96.7217 31.6516 100.26 30.8407 104.268 30.8407L104.273 30.8354Z" fill="#1D1D1B"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1_5">
                                    <rect width="168" height="135" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
                <nav>
                    <a href="index.html">Inicio</a>
                    <a href="index.html#projects">Proyectos</a>
                    <a href="index.html#about">Sobre nosotros</a>
                    <a href="contact.php">Contacto</a>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <h1>Contáctanos</h1>
            
            <?php if ($success): ?>
                <div class="message success">
                    <strong>¡Mensaje enviado correctamente! 🎉</strong><br>
                    ¡Gracias por contactarnos! Te responderemos pronto.
                </div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="message error">
                    <strong>Error al enviar el mensaje</strong><br>
                    Por favor, verifica que todos los campos estén completos y el email sea válido.
                </div>
            <?php endif; ?>
            
            <div class="contact-form">
                <form method="post" action="contact.php">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" placeholder="María García" required value="<?php echo $success ? '' : (isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="maria@dominio.com" required value="<?php echo $success ? '' : (isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje</label>
                        <textarea id="message" name="message" placeholder="Escribe tu consulta aquí....." required><?php echo $success ? '' : (isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''); ?></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Enviar el mensaje</button>
                </form>
                
                <a href="index.html" class="back-link">← Volver al inicio</a>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>© <?php echo date('Y'); ?> i'm solutions. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
