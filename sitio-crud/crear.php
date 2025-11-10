<?php
require_once 'db.php';

$errores = [];
$nombre = '';
$correo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');

    if ($nombre === '') {
        $errores[] = 'El nombre es obligatorio.';
    }
    if ($correo === '') {
        $errores[] = 'El correo es obligatorio.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El correo no tiene un formato válido.';
    }

    if (empty($errores)) {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo) VALUES (:nombre, :correo)");
        $stmt->execute(['nombre' => $nombre, 'correo' => $correo]);
        header('Location: index.php');
        exit;
    }
}

require_once 'header.php';
?>
<span class="badge">Crear usuario</span>
<h2>Nuevo usuario</h2>
<p>Complete el formulario para registrar un nuevo usuario en el sistema.</p>

<?php if (!empty($errores)): ?>
    <ul>
        <?php foreach ($errores as $e): ?>
            <li style="color:#fecaca;"><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">
    <div class="field">
        <label for="nombre">Nombre completo</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
    </div>
    <div class="field">
        <label for="correo">Correo electrónico</label>
        <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($correo) ?>">
    </div>
    <input class="btn btn-primary" type="submit" value="Guardar usuario">
    <a class="btn" href="index.php">Cancelar</a>
</form>
<?php
require_once 'footer.php';
?>
