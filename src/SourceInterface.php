<?php

namespace SZonov\Text\Source;

/**
 * List of functions which should be implemented by text source classes
 *
 * Interface SourceInterface
 * @package SZonov\Text\Source
 */
interface SourceInterface {

    /**
     * Get one line from source
     *
     * @return string
     */
    public function getLine();

    /**
     * Get defined amounts of bytes from source
     *
     * @param int $amount
     * @return string
     */
    public function getByte($amount = 1);

    /**
     * Rewind source
     *
     * @return void
     */
    public function rewind();
}