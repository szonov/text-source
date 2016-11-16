<?php

namespace SZonov\Text\Source;

/**
 * Text source - file
 *
 * Class File
 * @package SZonov\Text\Source
 */
class File extends FilePointer {

    public function __construct($file)
    {
        if (!file_exists($file))
            throw new \InvalidArgumentException("'$file' is not a file");
        parent::__construct(fopen($file, 'r'));
    }
}