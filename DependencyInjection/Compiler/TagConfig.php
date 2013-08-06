<?php

/*
 * This file is part of the lxSocketBundle.
 *
 * (c) Victor J. C. Geyer <victorgeyer@ciscaja.com>
 */

namespace lx\SocketBundle\DependencyInjection\Compiler;

class TagConfig
{
    const CONNECTION_PROTOTYPE = 'lx_socket.connection_prototype';
    const CONNECTION = 'lx_socket.connection';
    const SOCKET = 'lx_socket.socket';
    const BUILDER = 'lx_socket.socket_builder';
    const FILE = 'lx_socket.file';
    const FILE_PROTOTYPE = 'lx_socket.file_prototype';
}