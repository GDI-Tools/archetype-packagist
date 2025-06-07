<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Support\Facades;

/**
 * @method static void resolveOptionsUsing(\Closure|null $resolver)
 * @method static void resolveTokenUsing(\Closure|null $resolver)
 * @method static void setUpProcess(callable $callback)
 * @method static void setUpTestCase(callable $callback)
 * @method static void setUpTestDatabase(callable $callback)
 * @method static void tearDownProcess(callable $callback)
 * @method static void tearDownTestCase(callable $callback)
 * @method static void callSetUpProcessCallbacks()
 * @method static void callSetUpTestCaseCallbacks(\Illuminate\Foundation\Testing\TestCase $testCase)
 * @method static void callSetUpTestDatabaseCallbacks(string $database)
 * @method static void callTearDownProcessCallbacks()
 * @method static void callTearDownTestCaseCallbacks(\Illuminate\Foundation\Testing\TestCase $testCase)
 * @method static mixed option(string $option)
 * @method static string|false token()
 *
 * @see \Illuminate\Testing\ParallelTesting
 */
class ParallelTesting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Illuminate\Testing\ParallelTesting::class;
    }
}
