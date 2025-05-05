<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevCacheClear extends Command
{
    /**
     * El nombre y la firma del comando.
     *
     * @var string
     */
    protected $signature = 'dev:clear';

    /**
     * La descripción del comando.
     *
     * @var string
     */
    protected $description = 'Limpia todas las cachés en el entorno de desarrollo sin afectar el autoload';

    /**
     * Ejecuta el comando.
     */
    public function handle()
    {
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('cache:clear');

        // No ejecutamos dump-autoload aquí para evitar problemas
        $this->info('Todas las cachés fueron limpiadas correctamente.');
        $this->info('Si tienes problemas con el autoload, ejecuta: composer dump-autoload');

        return Command::SUCCESS;
    }
}
