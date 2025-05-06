#!/bin/bash

# Script para iniciar Laravel y Astro simultáneamente
echo "Iniciando servidor Astro..."
cd $(dirname "$0")/public/astro
if [ -f "./server/entry.mjs" ]; then
    node ./server/entry.mjs > /dev/null 2>&1 &
    ASTRO_PID=$!
    echo "Servidor Astro iniciado con PID: $ASTRO_PID"
else
    echo "No se encontró el archivo de entrada de Astro"
    exit 1
fi

# Esperar un momento para que Astro se inicie
echo "Esperando que el servidor Astro se inicie..."
sleep 3

# Iniciar servidor Laravel
echo "Iniciando servidor Laravel..."
php artisan serve

# Cuando se detiene Laravel, también detener Astro
echo "Deteniendo servidor Astro..."
kill $ASTRO_PID