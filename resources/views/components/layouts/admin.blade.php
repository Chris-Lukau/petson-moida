<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/css/admin.css',
        'resources/css/admin/services.css',
        'resources/css/admin/employees.css',
        'resources/js/app.js'
    ])

    @livewireStyles
</head>
<body>

    {{ $slot }}

    @livewireScripts
</body>
</html>