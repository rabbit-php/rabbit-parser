<?php

namespace rabbit\parser;

/**
 * Trait DataParserAwareTrait
 * @package rabbit\parser
 */
trait DataParserAwareTrait
{
    /**
     * @var ParserInterface
     */
    private $parser;

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
