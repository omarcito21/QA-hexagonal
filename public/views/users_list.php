<?php

$title = 'Usuarios';

require __DIR__ . '/_header.php';
?>

<style>
    .users-page {
        margin-top: 20px;
    }

    /* HEADER */
    .users-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .users-top h2 {
        margin: 0;
    }

    .users-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background: #f8fafc;
    }

    th {
        text-align: left;
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
        padding: 14px;
    }

    td {
        padding: 16px 14px;
        border-top: 1px solid #f1f5f9;
        font-size: 14px;
    }

    tbody tr {
        transition: 0.2s;
    }

    tbody tr:hover {
        background: #f9fafb;
    }

    .badge {
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-user {
        background: #e0f2fe;
        color: #0369a1;
    }

    .badge-admin {
        background: #fee2e2;
        color: #b91c1c;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        text-decoration: none;
        background: #3b82f6;
        color: white;
        transition: 0.2s;
    }

    .btn-edit:hover {
        background: #2563eb;
    }

    .btn-delete {
        padding: 6px 10px;
        border-radius: 6px;
        border: none;
        font-size: 12px;
        background: #ef4444;
        color: white;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: #dc2626;
    }

    .empty {
        padding: 30px;
        text-align: center;
        color: #64748b;
    }
</style>

<div class="users-page">

    <div class="users-top">
        <div>
            <h2>Usuarios</h2>
            <p class="muted">Gestión de usuarios del sistema</p>
        </div>
    </div>

    <div class="users-card">

        <?php if (empty($users)): ?>
            <div class="empty">No hay usuarios registrados</div>
        <?php else: ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>

                        <td><?= htmlspecialchars($user->id()->value(), ENT_QUOTES, 'UTF-8') ?></td>

                        <td><?= htmlspecialchars($user->name()->value(), ENT_QUOTES, 'UTF-8') ?></td>

                        <td><?= htmlspecialchars($user->email()->value(), ENT_QUOTES, 'UTF-8') ?></td>

                        <td>
                            <?php $role = $user->role()->value; ?>
                            <span class="badge <?= $role === 'admin' ? 'badge-admin' : 'badge-user' ?>">
                                <?= strtoupper(htmlspecialchars($role, ENT_QUOTES, 'UTF-8')) ?>
                            </span>
                        </td>

                        <td>
                            <div class="actions">

                                <a class="btn-edit"
                                   href="index.php?route=user-edit&id=<?= urlencode($user->id()->value()) ?>">
                                   Editar
                                </a>

                                <form method="post"
                                      action="index.php?route=user-delete"
                                      onsubmit="return confirm('¿Eliminar usuario?');">

                                    <input type="hidden" name="id"
                                        value="<?= htmlspecialchars($user->id()->value(), ENT_QUOTES, 'UTF-8') ?>">

                                    <button type="submit" class="btn-delete">
                                        Eliminar
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php endif; ?>

    </div>

</div>

<?php
require __DIR__ . '/_footer.php';