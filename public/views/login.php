<?php

$title = 'Login';

require __DIR__ . '/_header.php';
?>

<style>
    .login-page {
        display: grid;
        grid-template-columns: 1fr 1fr;
        min-height: 70vh;
        border-radius: 12px;
        overflow: hidden;
    }

    .login-left {
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-left h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .login-left p {
        opacity: 0.9;
        line-height: 1.5;
    }

    .login-right {
        background: #ffffff;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-box {
        width: 100%;
        max-width: 350px;
    }

    .login-box h3 {
        margin-bottom: 5px;
        font-size: 22px;
    }

    .login-box .muted {
        margin-bottom: 20px;
        display: block;
    }

    .login-box form {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .login-box label {
        font-size: 13px;
        font-weight: 600;
    }

    .login-box input {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        transition: 0.2s;
    }

    .login-box input:focus {
        border-color: #3b82f6;
        background: #fff;
        outline: none;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
    }

    .login-box button {
        margin-top: 10px;
        padding: 12px;
        border-radius: 8px;
        border: none;
        background: #3b82f6;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .login-box button:hover {
        background: #2563eb;
    }

    @media (max-width: 768px) {
        .login-page {
            grid-template-columns: 1fr;
        }

        .login-left {
            display: none;
        }
    }
</style>

<div class="login-page">

    <div class="login-left">
        <h2>Bienvenid@s</h2>
        <p>
            Accede al sistema de gestión de usuarios de forma segura y rápida.
            Administra perfiles, roles y configuraciones desde un solo lugar.
        </p>
    </div>

    <div class="login-right">
        <div class="login-box">
            <h3>Iniciar sesión</h3>
            <span class="muted">Ingresa tus credenciales</span>

            <form method="post" action="index.php?route=login">
                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div>
                    <label>Contraseña</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>

</div>

<?php
require __DIR__ . '/_footer.php';