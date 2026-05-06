<?php

$title = 'Registro';

require __DIR__ . '/_header.php';
?>

<style>
    .register-page {
        min-height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .register-page::before {
        content: "";
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #3b82f6, transparent 70%);
        top: -100px;
        left: -100px;
        opacity: 0.3;
        filter: blur(60px);
    }

    .register-page::after {
        content: "";
        position: absolute;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, #10b981, transparent 70%);
        bottom: -100px;
        right: -100px;
        opacity: 0.3;
        filter: blur(60px);
    }

    .register-card {
        width: 100%;
        max-width: 480px;
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(15px);
        border-radius: 18px;
        padding: 40px;
        box-shadow: 0 25px 60px rgba(0,0,0,0.12);
        position: relative;
        z-index: 1;
    }

    .register-card h2 {
        margin-bottom: 5px;
        font-size: 26px;
        font-weight: 600;
    }

    .register-card .muted {
        margin-bottom: 25px;
        display: block;
    }

    .register-card form {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .form-group {
        position: relative;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 14px 14px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        font-size: 14px;
        transition: 0.25s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #3b82f6;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
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

    .register-card button {
        margin-top: 10px;
        padding: 14px;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        background: linear-gradient(135deg, #3b82f6, #10b981);
        color: white;
        transition: 0.3s;
    }

    .register-card button:hover {
        transform: translateY(-2px) scale(1.01);
        box-shadow: 0 10px 25px rgba(59,130,246,0.3);
    }
</style>

<div class="register-page">

    <div class="register-card">
        <h2>Crear cuenta </h2>
        <span class="muted">Únete al sistema y gestiona usuarios fácilmente</span>

        <form method="post" action="index.php?route=register">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" required minlength="2" maxlength="100">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" required minlength="8">
            </div>

            <div class="form-group">
                <label>Rol</label>
                <select name="role">
                    <option value="user" selected>USER</option>
                    <option value="admin">ADMIN</option>
                </select>
            </div>

            <button type="submit">Crear cuenta</button>
        </form>
    </div>

</div>

<?php
require __DIR__ . '/_footer.php';