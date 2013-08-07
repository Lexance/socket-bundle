<?php

/*
 * This file is part of the lxSocketBundle.
 *
 * (c) Victor J. C. Geyer <victorgeyer@ciscaja.com>
 */

namespace lx\SocketBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class SocketCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $builder_definitions = array();
        $tagged_builder_definitions = $container->findTaggedServiceIds(TagConfig::BUILDER);
        foreach($tagged_builder_definitions as $service_id => &$attributes) {
            foreach ($attributes as &$attribute)
                $builder_definitions[] = $container->getDefinition($service_id);
        }

        $tagged_socket_definitions = $container->findTaggedServiceIds(TagConfig::SOCKET);
        foreach($tagged_socket_definitions as $service_id => &$attributes) {
            foreach ($attributes as &$attribute) {
                if(!isset($attribute['method']))
                    continue;
                /** @var Definition $socket_definition */
                $socket_definition = $container->getDefinition($service_id);

                foreach($builder_definitions as $builder_definition){
                    /** @var Definition $builder_definition */
                    $builder_definition->addMethodCall('addSocketClass', array($attribute['method'], $socket_definition->getClass()));
                }
            }
        }
    }
}