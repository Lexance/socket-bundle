<?php

/*
 * This file is part of the lxSocketBundle.
 *
 * (c) Victor J. C. Geyer <victorgeyer@ciscaja.com>
 */

namespace lx\SocketBundle;

use lx\SocketBundle\DependencyInjection\Compiler\SocketCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class lxSocketBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new SocketCompilerPass());
    }
}