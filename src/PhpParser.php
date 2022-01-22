<?php

declare(strict_types=1);

namespace Rabbit\Parser;

/**
 * Class PhpParser
 * @package Rabbit\Parser
 */
class PhpParser implements ParserInterface
{
    private bool $msgAvailable = false;

    /**
     * PhpParser constructor.
     */
    public function __construct()
    {
        $this->msgAvailable = \extension_loaded('msgpack');
    }

    /**
     * @param mixed $data
     * @return string
     */
    public function encode($data): string
    {
        return $this->msgAvailable ? \msgpack_pack($data) : \serialize($data);
    }

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data)
    {
        return $this->msgAvailable ? \msgpack_unpack($data) : \unserialize(
            $data,
            ['allowed_classes' => false]
        );
    }
}
