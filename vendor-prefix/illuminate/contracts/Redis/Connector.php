<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 07-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Contracts\Redis;

interface Connector
{
    /**
     * Create a connection to a Redis cluster.
     *
     * @param  array  $config
     * @param  array  $options
     * @return \Illuminate\Redis\Connections\Connection
     */
    public function connect(array $config, array $options);

    /**
     * Create a connection to a Redis instance.
     *
     * @param  array  $config
     * @param  array  $clusterOptions
     * @param  array  $options
     * @return \Illuminate\Redis\Connections\Connection
     */
    public function connectToCluster(array $config, array $clusterOptions, array $options);
}
