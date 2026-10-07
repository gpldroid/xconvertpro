<?php

namespace App\Livewire;

use App\Dashboard;
use App\Models\User;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Winter\LaravelConfigWriter\ArrayFile;

class Installer extends Component
{
    public $name, $version;

    public int $stage = 0;

    public string $databaseUsername = '';
    public string $databasePassword = '';
    public string $databaseName = '';
    public string $databasePort = '3306';
    public string $databaseHost = 'localhost';

    public string $adminUsername              = 'admin';
    public string $adminPassword              = '';
    public string $adminPassword_confirmation = '';
    public string $adminEmail                 = '';
    public string $url                        = '';

    protected array $dataBaseRules = [
        'databasePassword'           => 'required',
        'databaseUsername'           => 'required',
        'databaseName'               => 'required',
        'databasePort'               => 'required|numeric',
        'databaseHost'               => 'required',
    ];

    protected array $userRules = [
        'adminUsername'              => 'required',
        'adminEmail'                 => 'required|email',
        'adminPassword'              => 'required|min:8|confirmed',
        'adminPassword_confirmation' => 'required',
        'url'                        => 'required|url'
    ];

    public function requirements(): array
    {
        return [
            'extensions' => [
                'Bcmath'    => extension_loaded('bcmath'),
                'Ctype'     => extension_loaded('ctype'),
                'cURL'      => extension_loaded('curl'),
                'DOM'       => extension_loaded('dom'),
                'Fileinfo'  => extension_loaded('fileinfo'),
                'Filter'    => extension_loaded('filter'),
                'Hash'      => extension_loaded('hash'),
                'Imagick'   => extension_loaded('imagick'),
                'Intl'      => extension_loaded('intl'),
                'Mbstring'  => extension_loaded('mbstring'),
                'OpenSSL'   => extension_loaded('openssl'),
                'PCRE'      => extension_loaded('pcre'),
                'PDO'       => extension_loaded('pdo'),
                'Session'   => extension_loaded('session'),
                'Tokenizer' => extension_loaded('tokenizer'),
                'XML'       => extension_loaded('xml'),
                'Zip'       => extension_loaded('zip'),
            ],
            'system' => [
                'PHP'                           => version_compare(PHP_VERSION, '8.1', ">="),
                'Public directory is writable'  => File::isWritable(public_path()),
                'Storage directory is writable' => File::isWritable(storage_path()),
            ],
        ];
    }

    public function submitRequirements(): void
    {
        $extensions = $this->requirements()['extensions'];
        $system     = $this->requirements()['system'];
        if (!in_array(false, $extensions) && !in_array(false, $system)) {
            saveProgress('requirements');
            $this->stage = 1;
        } else {
            notify('danger', 'Please make sure all the requirements are satisfied.');
        }
    }

    public function submitDatabase()
    {
        $this->validate($this->dataBaseRules);

        Config::set("database.connections.mysql", [
            'driver' => 'mysql',
            "host"     => $this->databaseHost,
            "database" => $this->databaseName,
            "port"     => $this->databasePort,
            "username" => $this->databaseUsername,
            "password" => $this->databasePassword
        ]);
        DB::purge();
        try {
            Artisan::call('migrate --force --seed');

            $config = ArrayFile::open(base_path('bootstrap/cache/config.php'));
            $config->set('database.connections.mysql.host', $this->databaseHost);
            $config->set('database.connections.mysql.port', $this->databasePort);
            $config->set('database.connections.mysql.database', $this->databaseName);
            $config->set('database.connections.mysql.username', $this->databaseUsername);
            $config->set('database.connections.mysql.password', $this->databasePassword);
            $config->write();

            saveProgress('database');
            $this->stage = 2;
        } catch (\Exception) {
            notify('danger', 'Could not connect to the database with these details.');
        }
    }

    public function submitAdmin()
    {
        $this->validate($this->userRules);

        try {
            $user = new User;
            $user->name              = $this->adminUsername;
            $user->email             = $this->adminEmail;
            $user->email_verified_at = now();
            $user->password          = $this->adminPassword;
            $user->save();

            $config = ArrayFile::open(base_path('bootstrap/cache/config.php'));
            $config->set('app.env', 'production');
            $config->set('app.debug', false);
            $config->set('app.url', $this->url);
            # generating a new key makes the page expire after install
            // $config->set('app.key', $this->generateRandomKey());
            $config->write();

            saveProgress('admin', 'installed');
            notify('success', 'The application is installed successfully');
            return redirect()->route('filament.admin.auth.login');
        } catch (\Exception) {
            notify('danger', 'Could not create user');
        }
    }

    private function generateRandomKey()
    {
        return 'base64:' . base64_encode(
            Encrypter::generateKey(config('app.cipher'))
        );
    }

    public function mount()
    {
        if (checkProgress('installed')) {
            return redirect('/');
        }

        $this->name    = Dashboard::NAME;
        $this->version = Dashboard::VERSION;

        $this->url = url('/');
        if (Str::startsWith($this->url, 'http') && !Str::startsWith($this->url, 'https')) {
            if (isCloudFlareHttps()) {
                $this->url = 'https' . substr($this->url, 4);
            }
        }

        if (checkProgress('requirements')) {
            $this->stage = 1;
        }
        if (checkProgress('database')) {
            $this->stage = 2;
        }
    }

    #[Layout('components.layouts.installer')]
    public function render()
    {
        return view('livewire.installer');
    }
}
