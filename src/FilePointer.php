<?php

namespace SZonov\Text\Source;

/**
 * Text source - file pointer
 *
 * Class FilePointer
 * @package SZonov\Text\Source
 */
class FilePointer implements SourceInterface {

    /**
     * Parameter $length in function fgets ( resource $handle [, int $length ] )
     *
     * @var int
     */
    protected $lineReadLength = 32768;

    /**
     * File pointer
     *
     * @var resource
     */
    protected $fp;

    /**
     * FilePointer constructor.
     *
     * @param $fp
     * @param int|null $lineReadLength
     */
    public function __construct($fp, $lineReadLength = 0)
    {
        if (!is_resource($fp))
            throw new \InvalidArgumentException("input argument is not resource");
        $this->fp = $fp;
        if ($lineReadLength !== 0)
            $this->lineReadLength = $lineReadLength;
    }

    /**
     * Close opened resource
     */
    public function __destruct()
    {
        fclose ($this->fp);
    }

    /**
     * Get one line
     *
     * @return bool|string
     */
    public function getLine()
    {
        return (feof($this->fp)) ? false : fgets($this->fp, $this->lineReadLength);
    }

    /**
     * Get defined amount of bytes
     *
     * @param int $amount
     * @return string
     */
    public function getByte($amount = 1)
    {
        return fread($this->fp, $amount);
    }

    /**
     * Rewind file pointer
     */
    public function rewind()
    {
        rewind($this->fp);
    }
}