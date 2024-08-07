<?php

namespace YukataRm\File\Proxy\Manager;

use YukataRm\File\Reader\Interface;
use YukataRm\File\Reader;

/**
 * Reader Proxy Manager
 * 
 * @package YukataRm\File\Proxy\Manager
 */
class ReaderManager
{
    /**
     * make Common Reader instance
     * 
     * @return \YukataRm\File\Reader\Interface\CommonInterface
     */
    public function common(): Interface\CommonInterface
    {
        return new Reader\Common();
    }

    /**
     * make Csv Reader instance
     * 
     * @return \YukataRm\File\Reader\Interface\CsvInterface
     */
    public function csv(): Interface\CsvInterface
    {
        return new Reader\Csv();
    }
}
