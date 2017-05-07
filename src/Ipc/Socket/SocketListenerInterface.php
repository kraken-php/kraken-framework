<?php

namespace Kraken\Ipc\Socket;

use Kraken\Event\EventEmitterInterface;
use Kraken\Loop\LoopResourceInterface;
use Kraken\Stream\StreamBaseInterface;

/**
 * @event connect : callable(object, SocketInterface)
 */
interface SocketListenerInterface extends EventEmitterInterface, LoopResourceInterface, StreamBaseInterface
{
    const TRANSPORT_TCP = 'tcp';
    const TRANSPORT_UDP = 'udp';
    const TRANSPORT_SSL = 'ssl';
    const TRANSPORT_TLS = 'tls';

    /**
     * Star listener and underlying resource object.
     *
     * @return void
     */
    public function start();

    /**
     * Stop listener and underlying resource object. It is an alias for close() method.
     *
     * @see StreamBaseInterface::close
     */
    public function stop();

    /**
     * Get listener endpoint.
     *
     * This method returns server endpoint with this pattern [$protocol://$address:$port].
     *
     * @return string
     */
    public function getLocalEndpoint();

    /**
     * Get socket local address.
     *
     * @return string
     */
    public function getLocalAddress();

    /**
     * Get socket local host.
     *
     * @return string
     */
    public function getLocalHost();

    /**
     * Get socket local port.
     *
     * @return string
     */
    public function getLocalPort();
}
