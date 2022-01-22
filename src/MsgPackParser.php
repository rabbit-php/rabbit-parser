<?php

declare(strict_types=1);

namespace Rabbit\Parser;

class MsgPackParser implements ParserInterface
{
    private bool $hasMsgPack = false;

    public function __construct(private bool $allowed = true)
    {
        $this->hasMsgPack = \extension_loaded('msgpack');
    }

    public function encode($data): string
    {
        return $this->hasMsgPack ? \msgpack_pack($data) : serialize($data);
    }

    public function decode(string $data)
    {
        return $this->hasMsgPack ? \msgpack_unpack($data) : unserialize($data, ['allowed_classes' => $this->allowed]);
    }
}
