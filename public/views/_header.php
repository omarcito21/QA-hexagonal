<?php
declare(strict_types=1);
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'User Module', ENT_QUOTES, 'UTF-8') ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            color: #0f172a;
        }

        header {
            background: #0f172a;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .logo {
            font-weight: 600;
            color: #fff;
            font-size: 18px;
        }

        nav a {
            color: #cbd5f5;
            text-decoration: none;
            margin-left: 18px;
            font-size: 14px;
            transition: 0.2s;
        }

        nav a:hover {
            color: #38bdf8;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        }

        h2 {
            margin-top: 0;
            font-weight: 600;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        label {
            font-size: 13px;
            font-weight: 600;
        }

        input, select {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: #f9fafb;
            transition: 0.2s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #3b82f6;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(59,130,246,0.15);
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #3b82f6;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #2563eb;
        }

        button.secondary {
            background: #ef4444;
        }

        button.secondary:hover {
            background: #dc2626;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: #f1f5f9;
            text-align: left;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f8fafc;
        }

        .flash {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .flash.success {
            background: #ecfdf5;
            color: #047857;
        }

        .flash.error {
            background: #fef2f2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">Omarcito21</div>

    <nav>
        <?php if (empty($currentUser)): ?>
            <a href="index.php?route=register">Registro</a>
            <a href="index.php?route=login">Login</a>
        <?php else: ?>
            <a href="index.php?route=profile">Mi perfil</a>
            <?php if (($currentUser['role'] ?? '') === 'admin'): ?>
                <a href="index.php?route=users">Usuarios</a>
            <?php endif; ?>
            <a href="index.php?route=logout">Salir</a>
        <?php endif; ?>
    </nav>
</header>

<div class="container">

<?php if (!empty($flash)): ?>
    <div class="flash <?= htmlspecialchars($flash['type'], ENT_QUOTES, 'UTF-8') ?>">
        <?= htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>