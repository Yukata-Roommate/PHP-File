<?php

namespace YukataRm\File;

use YukataRm\File\Interface\ReaderInterface;
use YukataRm\File\Base\Reader as BaseReader;

/**
 * Reader
 *
 * @package YukataRm\File
 */
class Reader extends BaseReader implements ReaderInterface
{
    /*----------------------------------------*
     * Read Line
     *----------------------------------------*/

    /**
     * get file data
     *
     * @param \SplFileObject $file
     * @return string
     */
    protected function getFileData(\SplFileObject $file): string
    {
        return $file->fgets();
    }
}
