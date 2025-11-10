<?php
require_once 'db.php';

$errores = [];
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT id, nombre, correo FROM usuarios WHERE id = :id");
$stmt->execute(['id' => $id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    exit('Usuario no encontrado.');
}

$nombre = $usuario['nombre'];
$correo = $usuario['correo'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');

    if ($nombre === '') {
        $errores[] = 'El nombre es obligatorio.';
    }
    if ($Correo === '') {
        $errores[] = 'El correo es obligatorio.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El correo no tiene un formato válido.';
    }

    if (empty($errores)) {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre = :nombre, correo = :correo WHERE id = :id");
        $stmt->execute(['nombre' => $nombre, 'correo' => $correo, 'id' => $id]);
        header('Location: index.php');
        exit;
    }
}

require_once 'header.php';
?>
<span class="badge">Editar usuario</span>
<h2>Editar usuario #<?= htmlspecialchars($usuario['id']) ?></h2>

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
    <input class="btn btn-primary" type="submit" value="Actualizar usuario">
    <a class="btn" href="index.php">Cancelar</a>
</form>
<?php
require_once 'footer.php';
?>
