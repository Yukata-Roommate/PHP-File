<?php

namespace YukataRm\File\Reader;

use YukataRm\File\Reader\Interface\CommonInterface;
use YukataRm\File\Reader\BaseReader;

/**
 * Common Reader
 * 
 * @package YukataRm\File\Reader
 */
class Common extends BaseReader implements CommonInterface
{
    /*----------------------------------------*
     * Read - Line
     *----------------------------------------*/

    /**
     * get file data
     * 
     * @param \SplFileObject $file
     * @return mixed
     */
    protected function getFileData(\SplFileObject $file): mixed
    {
        return $file->fgets();
    }
}
