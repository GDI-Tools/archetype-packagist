<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Dotenv;

use Archetype\Vendor\Dotenv\Exception\InvalidPathException;
use Archetype\Vendor\Dotenv\Loader\Loader;
use Archetype\Vendor\Dotenv\Loader\LoaderInterface;
use Archetype\Vendor\Dotenv\Parser\Parser;
use Archetype\Vendor\Dotenv\Parser\ParserInterface;
use Archetype\Vendor\Dotenv\Repository\Adapter\ArrayAdapter;
use Archetype\Vendor\Dotenv\Repository\Adapter\PutenvAdapter;
use Archetype\Vendor\Dotenv\Repository\RepositoryBuilder;
use Archetype\Vendor\Dotenv\Repository\RepositoryInterface;
use Archetype\Vendor\Dotenv\Store\StoreBuilder;
use Archetype\Vendor\Dotenv\Store\StoreInterface;
use Archetype\Vendor\Dotenv\Store\StringStore;

class Dotenv
{
    /**
     * The store instance.
     *
     * @var \Archetype\Vendor\Dotenv\Store\StoreInterface
     */
    private $store;

    /**
     * The parser instance.
     *
     * @var \Archetype\Vendor\Dotenv\Parser\ParserInterface
     */
    private $parser;

    /**
     * The loader instance.
     *
     * @var \Archetype\Vendor\Dotenv\Loader\LoaderInterface
     */
    private $loader;

    /**
     * The repository instance.
     *
     * @var \Archetype\Vendor\Dotenv\Repository\RepositoryInterface
     */
    private $repository;

    /**
     * Create a new dotenv instance.
     *
     * @param \Archetype\Vendor\Dotenv\Store\StoreInterface           $store
     * @param \Archetype\Vendor\Dotenv\Parser\ParserInterface         $parser
     * @param \Archetype\Vendor\Dotenv\Loader\LoaderInterface         $loader
     * @param \Archetype\Vendor\Dotenv\Repository\RepositoryInterface $repository
     *
     * @return void
     */
    public function __construct(
        StoreInterface $store,
        ParserInterface $parser,
        LoaderInterface $loader,
        RepositoryInterface $repository
    ) {
        $this->store = $store;
        $this->parser = $parser;
        $this->loader = $loader;
        $this->repository = $repository;
    }

    /**
     * Create a new dotenv instance.
     *
     * @param \Archetype\Vendor\Dotenv\Repository\RepositoryInterface $repository
     * @param string|string[]                        $paths
     * @param string|string[]|null                   $names
     * @param bool                                   $shortCircuit
     * @param string|null                            $fileEncoding
     *
     * @return \Archetype\Vendor\Dotenv\Dotenv
     */
    public static function create(RepositoryInterface $repository, $paths, $names = null, bool $shortCircuit = true, ?string $fileEncoding = null)
    {
        $builder = $names === null ? StoreBuilder::createWithDefaultName() : StoreBuilder::createWithNoNames();

        foreach ((array) $paths as $path) {
            $builder = $builder->addPath($path);
        }

        foreach ((array) $names as $name) {
            $builder = $builder->addName($name);
        }

        if ($shortCircuit) {
            $builder = $builder->shortCircuit();
        }

        return new self($builder->fileEncoding($fileEncoding)->make(), new Parser(), new Loader(), $repository);
    }

    /**
     * Create a new mutable dotenv instance with default repository.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Archetype\Vendor\Dotenv\Dotenv
     */
    public static function createMutable($paths, $names = null, bool $shortCircuit = true, ?string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new mutable dotenv instance with default repository with the putenv adapter.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Archetype\Vendor\Dotenv\Dotenv
     */
    public static function createUnsafeMutable($paths, $names = null, bool $shortCircuit = true, ?string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()
            ->addAdapter(PutenvAdapter::class)
            ->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new immutable dotenv instance with default repository.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Archetype\Vendor\Dotenv\Dotenv
     */
    public static function createImmutable($paths, $names = null, bool $shortCircuit = true, ?string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()->immutable()->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new immutable dotenv instance with default repository with the putenv adapter.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Archetype\Vendor\Dotenv\Dotenv
     */
    public static function createUnsafeImmutable($paths, $names = null, bool $shortCircuit = true, ?string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithDefaultAdapters()
            ->addAdapter(PutenvAdapter::class)
            ->immutable()
            ->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Create a new dotenv instance with an array backed repository.
     *
     * @param string|string[]      $paths
     * @param string|string[]|null $names
     * @param bool                 $shortCircuit
     * @param string|null          $fileEncoding
     *
     * @return \Archetype\Vendor\Dotenv\Dotenv
     */
    public static function createArrayBacked($paths, $names = null, bool $shortCircuit = true, ?string $fileEncoding = null)
    {
        $repository = RepositoryBuilder::createWithNoAdapters()->addAdapter(ArrayAdapter::class)->make();

        return self::create($repository, $paths, $names, $shortCircuit, $fileEncoding);
    }

    /**
     * Parse the given content and resolve nested variables.
     *
     * This method behaves just like load(), only without mutating your actual
     * environment. We do this by using an array backed repository.
     *
     * @param string $content
     *
     * @throws \Archetype\Vendor\Dotenv\Exception\InvalidFileException
     *
     * @return array<string, string|null>
     */
    public static function parse(string $content)
    {
        $repository = RepositoryBuilder::createWithNoAdapters()->addAdapter(ArrayAdapter::class)->make();

        $phpdotenv = new self(new StringStore($content), new Parser(), new Loader(), $repository);

        return $phpdotenv->load();
    }

    /**
     * Read and load environment file(s).
     *
     * @throws \Archetype\Vendor\Dotenv\Exception\InvalidPathException|\Archetype\Vendor\Dotenv\Exception\InvalidEncodingException|\Archetype\Vendor\Dotenv\Exception\InvalidFileException
     *
     * @return array<string, string|null>
     */
    public function load()
    {
        $entries = $this->parser->parse($this->store->read());

        return $this->loader->load($this->repository, $entries);
    }

    /**
     * Read and load environment file(s), silently failing if no files can be read.
     *
     * @throws \Archetype\Vendor\Dotenv\Exception\InvalidEncodingException|\Archetype\Vendor\Dotenv\Exception\InvalidFileException
     *
     * @return array<string, string|null>
     */
    public function safeLoad()
    {
        try {
            return $this->load();
        } catch (InvalidPathException $e) {
            // suppressing exception
            return [];
        }
    }

    /**
     * Required ensures that the specified variables exist, and returns a new validator object.
     *
     * @param string|string[] $variables
     *
     * @return \Archetype\Vendor\Dotenv\Validator
     */
    public function required($variables)
    {
        return (new Validator($this->repository, (array) $variables))->required();
    }

    /**
     * Returns a new validator object that won't check if the specified variables exist.
     *
     * @param string|string[] $variables
     *
     * @return \Archetype\Vendor\Dotenv\Validator
     */
    public function ifPresent($variables)
    {
        return new Validator($this->repository, (array) $variables);
    }
}
