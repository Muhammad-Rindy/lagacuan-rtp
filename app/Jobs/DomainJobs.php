<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Filesystem\Filesystem;

class DomainJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $type;
    protected $domain;
    protected $redirect;

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($type, $domain, $redirect = null)
    {
        $this->type = $type;
        $this->domain = $domain;
        $this->redirect = $redirect;
        $this->files = new Filesystem;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        if ($this->type == "delete") {
            $this->files->delete($path);
        }else{
            $contents = $this->getSourceFile();
            $this->files->put($path, $contents);
        }

        shell_exec('sudo systemctl restart nginx');
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path('storage\\app\\server') .'\\' .$this->domain . '.conf';
    }

    /**
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return match ($this->type) {
            'domain' => base_path('stubs') .'/'. 'domain.stub',
            'redirect' => base_path('stubs') .'/'. 'redirect.stub',
            'delete' => base_path('stubs') .'/'. 'redirect.stub',
            default => null,
        };
    }

    /**
    **
    * Map the stub variables present in stub to its value
    *
    * @return array
    *
    */
    public function getStubVariables()
    {
        return [
            'domainName' => $this->domain,
            'redirectDomain' => $this->redirect,
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace($search , $replace, $contents);
        }

        return $contents;

    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
