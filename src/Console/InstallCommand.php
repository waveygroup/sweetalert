<?php

namespace Wavey\Sweetalert\Console;

use function base_path;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use function resource_path;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sweetalert:install {--npm : Indicates to require the needed SweetAlert2 NPM package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Sweetalert components and resources';

    public function handle()
    {
        $this->callSilent('vendor:publish', ['--tag' => 'sweetalert-config', '--force' => true]);

        // Install NPM Package.
        if ($this->option('npm')) {
            $this->installNPM();
        }

        // Policies...
        ( new Filesystem() )->copyDirectory(__DIR__.'/../../views/', resource_path(
            'views/vendor/wavey/sweetalert'
        ));
    }

    protected function installNPM()
    {
        // Install the NPM Package.
        ( new Process(['npm', 'install', '&&', 'npm', 'install', 'sweetalert2', '--save'], base_path()) )
            ->setTimeout(null)
            ->run(function ($type, $output) {
                $this->output->write($output);
            });
    }
}
