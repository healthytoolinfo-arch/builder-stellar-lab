<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto | i'm solutions</title>
    <meta name="description" content="Contacta con el equipo de i'm solutions para más información o colaboraciones." />
    <link rel="stylesheet" href="assets/styles.css" />
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <main>
      <h1>Contacto</h1>
      <form method="post" action="send-contact.php" style="max-width:400px;margin:auto;">
        <label>Nombre:<br><input type="text" name="nombre" required></label><br><br>
        <label>Email:<br><input type="email" name="email" required></label><br><br>
        <label>Mensaje:<br><textarea name="mensaje" rows="5" required></textarea></label><br><br>
        <button type="submit">Enviar</button>
      </form>
    </main>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
