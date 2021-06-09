<?php

declare(strict_types=1);

namespace Rabbit\Parser;

/**
 * Class PhpParser
 * @package Rabbit\Parser
 */
class PhpParser implements ParserInterface
{
    /**
     * @var bool whether [igbinary serialization](https://pecl.php.net/package/igbinary) is available or not.
     */
    private bool $igbinaryAvailable = false;

    /**
     * PhpParser constructor.
     */
    public function __construct()
    {
        $this->igbinaryAvailable = \extension_loaded('igbinary');
    }

    /**
     * @param mixed $data
     * @return string
     */
    public function encode($data): string
    {
        return $this->igbinaryAvailable ? \igbinary_serialize($data) : \serialize($data);
    }

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data)
    {
        return $this->igbinaryAvailable ? \igbinary_unserialize($data) : \unserialize(
            $data,
            ['allowed_classes' => false]
        );
    }
}
