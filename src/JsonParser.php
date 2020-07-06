<?php
declare(strict_types=1);

namespace Rabbit\Parser;

/**
 * Class JsonParser
 * @package Rabbit\Parser
 */
class JsonParser implements ParserInterface
{
    /**
     * @var bool
     */
    protected bool $assoc = true;

    /**
     * JsonParser constructor.
     * @param null $assoc
     */
    public function __construct($assoc = null)
    {
        if ($assoc !== null) {
            $this->setAssoc($assoc);
        }
    }

    /**
     * @param string $data
     * @return mixed
     */
    public function decode(string $data)
    {
        return \json_decode($data, $this->assoc);
    }

    /**
     * @param mixed $data
     * @return string
     */
    public function encode($data): string
    {
        return \json_encode($data);
    }

    /**
     * @return bool
     */
    public function isAssoc(): bool
    {
        return $this->assoc;
    }

    /**
     * @param bool $assoc
     */
    public function setAssoc(bool $assoc): void
    {
        $this->assoc = $assoc;
    }
}
