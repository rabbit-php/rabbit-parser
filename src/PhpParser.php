<?php
/**
 * Created by PhpStorm.
 * User: inhere
 * Date: 2017-12-14
 * Time: 19:07
 */

namespace rabbit\parser;

/**
 * Class PhpParser
 * @package rabbit\parser
 */
class PhpParser implements ParserInterface
{
    /**
     * @var bool whether [igbinary serialization](https://pecl.php.net/package/igbinary) is available or not.
     */
    private $igbinaryAvailable = false;

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
