# AppSalón

## Resumen

Sistema de citas para organizar reservas, horarios y servicios. Permite solicitar una cita desde una vista pública y administrarla desde paneles para funcionarios y administradores.

## Flujos

- Solicitar una reserva y consultar su estado desde la vista pública.
- Gestionar citas, servicios y horarios según el rol de la cuenta.
- Importar o exportar datos de citas y generar reportes desde el panel de trabajo.

## Desarrollo local

El proyecto usa Laravel, Inertia, React, TypeScript y Vite. Revisa los requisitos de PHP en [composer.json](composer.json). Usa una base de datos local para las migraciones.

```bash
composer install
cp .env.example .env
php artisan key:generate
npm ci
```

Configura la base de datos en `.env` y después ejecuta `php artisan migrate` y `composer run dev`. Las rutas están en [routes/web.php](routes/web.php).

## English summary

An appointment system for managing bookings, schedules, and services. Visitors can request an appointment, while staff and administrators manage it through role-based dashboards.
