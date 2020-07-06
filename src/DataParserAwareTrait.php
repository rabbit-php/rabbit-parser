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
            $this->parser = new PhpParser();
        }

        return $this->parser;
    }

    /**
     * @param ParserInterface $parser
     */
    public function setParser(ParserInterface $parser): void
    {
        $this->parser = $parser;
    }
}
