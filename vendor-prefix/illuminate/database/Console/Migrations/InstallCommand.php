<?php

namespace Archetype\Vendor\Illuminate\Database\Console\Migrations;

use Archetype\Vendor\Illuminate\Console\Command;
use Archetype\Vendor\Illuminate\Database\Migrations\MigrationRepositoryInterface;
use Archetype\Vendor\Symfony\Component\Console\Attribute\AsCommand;
use Archetype\Vendor\Symfony\Component\Console\Input\InputOption;
#[AsCommand(name: 'migrate:install')]
class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'migrate:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the migration repository';
    /**
     * The repository instance.
     *
     * @var \Illuminate\Database\Migrations\MigrationRepositoryInterface
     */
    protected $repository;
    /**
     * Create a new migration install command instance.
     *
     * @param  \Illuminate\Database\Migrations\MigrationRepositoryInterface  $repository
     */
    public function __construct(MigrationRepositoryInterface $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->repository->setSource($this->input->getOption('database'));
        if (!$this->repository->repositoryExists()) {
            $this->repository->createRepository();
        }
        $this->components->info('Migration table created successfully.');
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [['database', null, InputOption::VALUE_OPTIONAL, 'The database connection to use']];
    }
}
