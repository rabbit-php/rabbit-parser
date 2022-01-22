<?php

declare(strict_types=1);

namespace Rabbit\Parser;

/**
 * Trait DataParserAwareTrait
 * @package Rabbit\Parser
 */
trait DataParserAwareTrait
{
    /**
     * @var ParserInterface
     */
    private ParserInterface $parser;

    /**
     * @return ParserInterface
     */
    public function getParser(): ParserInterface
    {
        if (!$this->parser) {
            $this->parser = new MsgPackParser(false);
        }

        return $this->parser;
    }
}
