<?php

namespace SZonov\Text\Source;

/**
 * Text source - console command output
 *
 * Class Command
 * @package SZonov\Text\Source
 */
class Command extends FilePointer {

    protected $_command;

    public function __construct($command)
    {
        $this->_command = $command;
        parent::__construct(popen($this->_command, "r"));
    }

    public function rewind()
    {
        @fclose($this->fp);
        parent::__construct(popen($this->_command, "r"));
    }
}