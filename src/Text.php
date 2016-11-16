<?php

namespace SZonov\Text\Source;

/**
 * Text source - string
 *
 * Class Text
 * @package SZonov\Text\Source
 */
class Text extends FilePointer {

    public function __construct($string)
    {
        parent::__construct(fopen("php://memory", 'r+'));
        fputs($this->fp, $string);
        $this->rewind();
    }
}