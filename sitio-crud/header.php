<?php
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios - MiEmpresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            margin: 0;
            background: #020617;
            color: #e5e7eb;
        }
        header {
            background: linear-gradient(135deg, #22c55e, #0ea5e9);
            padding: 1.5rem 1rem;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }
        header p {
            margin: 0.4rem 0 0;
            font-size: 0.95rem;
            opacity: 0.9;
        }
        main {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1rem 2rem;
        }
        .card {
            background: rgba(15, 23, 42, 0.95);
            border-radius: 0.9rem;
            padding: 1.5rem;
            border: 1px solid rgba(148, 163, 184, 0.5);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.9);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        th, td {
            padding: 0.6rem 0.5rem;
            border-bottom: 1px solid rgba(55, 65, 81, 0.7);
            text-align: left;
        }
        th {
            font-weight: 600;
            color: #bfdbfe;
        }
        a {
            color: #60a5fa;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.7);
            font-size: 0.8rem;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary {
            background: #22c55e;
            border-color: #4ade80;
            color: #022c22;
            font-weight: 600;
        }
        .btn-danger {
            border-color: #fca5a5;
            color: #fecaca;
        }
        .btn-secondary {
            border-color: #93c5fd;
            color: #bfdbfe;
        }
        .actions {
            display: flex;
            gap: 0.35rem;
        }
        form.inline {
            display: inline;
        }
        .field {
            margin-bottom: 0.7rem;
        }
        label {
            display: block;
            font-size: 0.85rem;
            margin-bottom: 0.2rem;
            color: #cbd5f5;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 0.45rem 0.6rem;
            border-radius: 0.6rem;
            border: 1px solid rgba(148, 163, 184, 0.8);
            background: rgba(15, 23, 42, 0.9);
            color: #e5e7eb;
        }
        input[type="submit"] {
            margin-top: 0.6rem;
        }
        .badge {
            font-size: 0.7rem;
            padding: 0.15rem 0.5rem;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.7);
            color: #a5b4fc;
        }
        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
<header>
    <h1>Gestión de usuarios - MiEmpresa</h1>
    <p>Módulo CRUD de usuarios desplegado en la red privada (sitio 2 del taller).</p>
</header>
<main>
<div class="card">
