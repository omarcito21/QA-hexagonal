<?php

$title = 'Editar usuario';

require __DIR__ . '/_header.php';
?>

<style>
    .edit-page {
        min-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .edit-page::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #6366f1, transparent 70%);
        top: -120px;
        left: -120px;
        opacity: 0.3;
        filter: blur(70px);
    }

    .edit-page::after {
        content: "";
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, #22c55e, transparent 70%);
        bottom: -120px;
        right: -120px;
        opacity: 0.3;
        filter: blur(70px);
    }

    .edit-card {
        width: 100%;
        max-width: 520px;
        background: rgba(255,255,255,0.88);
        backdrop-filter: blur(16px);
        border-radius: 18px;
        box-shadow: 0 25px 60px rgba(0,0,0,0.12);
        overflow: hidden;
        position: relative;
        z-index: 1;
    }

    .edit-header {
        padding: 24px 30px;
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        color: white;
    }

    .edit-header h2 {
        margin: 0;
        font-size: 22px;
    }

    .edit-header p {
        margin: 4px 0 0;
        font-size: 13px;
        opacity: 0.9;
    }

    .edit-body {
        padding: 30px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .form-group {
        position: relative;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 14px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        font-size: 14px;
        transition: 0.25s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #6366f1;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }

    .form-group label {
        position: absolute;
        top: -8px;
        left: 10px;
        background: #fff;
        padding: 0 6px;
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
    }

    input[readonly] {
        background: #e5e7eb;
        cursor: not-allowed;
    }

    .edit-body button {
        margin-top: 10px;
        padding: 14px;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        background: linear-gradient(135deg, #6366f1, #22c55e);
        color: white;
        transition: 0.3s;
    }

    .edit-body button:hover {
        transform: translateY(-2px) scale(1.01);
        box-shadow: 0 10px 25px rgba(99,102,241,0.3);
    }
</style>

<div class="edit-page">

    <div class="edit-card">

        <div class="edit-header">
            <h2>Editar usuario</h2>
            <p>Actualiza la información del perfil</p>
        </div>

        <div class="edit-body">

            <form method="post" action="index.php?route=user-edit">
                <input type="hidden" name="id"
                    value="<?= htmlspecialchars($user->id()->value(), ENT_QUOTES, 'UTF-8') ?>">

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="name" required minlength="2" maxlength="100"
                        value="<?= htmlspecialchars($user->name()->value(), ENT_QUOTES, 'UTF-8') ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required
                        value="<?= htmlspecialchars($user->email()->value(), ENT_QUOTES, 'UTF-8') ?>">
                </div>

                <div class="form-group">
                    <label>Nueva contraseña</label>
                    <input type="password" name="password" minlength="8">
                </div>

                <?php if (!empty($isAdmin)): ?>
                    <div class="form-group">
                        <label>Rol</label>
                        <select name="role">
                            <option value="user" <?= $user->role()->value === 'user' ? 'selected' : '' ?>>USER</option>
                            <option value="admin" <?= $user->role()->value === 'admin' ? 'selected' : '' ?>>ADMIN</option>
                        </select>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label>Rol</label>
                        <input type="text"
                            value="<?= htmlspecialchars($user->role()->value, ENT_QUOTES, 'UTF-8') ?>"
                            readonly>
                    </div>
                <?php endif; ?>

                <button type="submit">Guardar cambios</button>
            </form>

        </div>

    </div>

</div>

<?php
require __DIR__ . '/_footer.php';