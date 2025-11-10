<?php
require_once 'db.php';
require_once 'header.php';

$stmt = $pdo->query("SELECT id, nombre, correo, fecha_registro FROM usuarios ORDER BY fecha_registro DESC");
$usuarios = $stmt->fetchAll();
?>
<div class="top-actions">
    <div>
        <span class="badge">Listado de usuarios</span>
        <p style="margin-top:0.4rem;font-size:0.9rem;">
            Aquí se listan todos los usuarios registrados en la base de datos <strong>usuariosdb</strong>.
        </p>
    </div>
    <a class="btn btn-primary" href="crear.php">+ Nuevo usuario</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php if (count($usuarios) === 0): ?>
        <tr>
            <td colspan="5">No hay usuarios registrados.</td>
        </tr>
    <?php else: ?>
        <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= htmlspecialchars($u['id']) ?></td>
            <td><?= htmlspecialchars($u['nombre']) ?></td>
            <td><?= htmlspecialchars($u['correo']) ?></td>
            <td><?= htmlspecialchars($u['fecha_registro']) ?></td>
            <td>
                <div class="actions">
                    <a class="btn btn-secondary" href="editar.php?id=<?= $u['id'] ?>">Editar</a>
                    <form class="inline" method="post" action="borrar.php" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                        <input type="hidden" name="id" value="<?= $u['id'] ?>">
                        <button class="btn btn-danger" type="submit">Borrar</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<?php
require_once 'footer.php';
?>
