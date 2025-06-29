<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace Archetype\Vendor\Doctrine\DBAL\Driver\Mysqli\Initializer;

use Archetype\Vendor\Doctrine\DBAL\Driver\Mysqli\Initializer;
use mysqli;
use SensitiveParameter;

final class Secure implements Initializer
{
    private string $key;
    private string $cert;
    private string $ca;
    private string $capath;
    private string $cipher;

    public function __construct(
        #[SensitiveParameter]
        string $key,
        string $cert,
        string $ca,
        string $capath,
        string $cipher
    ) {
        $this->key    = $key;
        $this->cert   = $cert;
        $this->ca     = $ca;
        $this->capath = $capath;
        $this->cipher = $cipher;
    }

    public function initialize(mysqli $connection): void
    {
        $connection->ssl_set($this->key, $this->cert, $this->ca, $this->capath, $this->cipher);
    }
}
