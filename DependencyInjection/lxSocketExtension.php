<?php

/*
 * This file is part of the lxSocketBundle.
 *
 * (c) Victor J. C. Geyer <victorgeyer@ciscaja.com>
 */

namespace lx\SocketBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class lxSocketExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config/services'));
        $loader->load('builder.xml');
        $loader->load('connections.xml');
        $loader->load('sockets.xml');
    }
}
