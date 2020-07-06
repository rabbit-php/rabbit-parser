<?php
declare(strict_types=1);

namespace Rabbit\Parser;

use RuntimeException;

/**
 * Class MsgPackParser
 * @package Rabbit\Parser
 */
class MsgPackParser implements ParserInterface
{
    /**
     * class constructor.
     * @throws RuntimeException
     */
    public function __construct()
    {
        if (!\function_exists('msgpack_pack')) {
            throw new RuntimeException("The php extension 'msgpack' is required!");
        }
    }

    /**
     * @param mixed $data
     * @return string
     */
    public function encode($data): string
    {
        return \msgpack_pack($data);
    }

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data)
    {
        return \msgpack_unpack($data);
    }
}
