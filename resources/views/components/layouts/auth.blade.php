<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
</head>
<body>
    <x-layouts.auth.simple :title="$title ?? null">
        {{ $slot }}
    </x-layouts.auth.simple>
    @livewireScripts
</body>
</html>

