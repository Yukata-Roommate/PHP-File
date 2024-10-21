<?php

namespace YukataRm\File\Proxy\Manager;

use YukataRm\File\Interface\WriterInterface;
use YukataRm\File\Writer;

/**
 * Writer Proxy Manager
 *
 * @package YukataRm\File\Proxy\Manager
 */
class WriterManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make Writer instance
     *
     * @return \YukataRm\File\Interface\WriterInterface
     */
    public function make(): WriterInterface
    {
        return new Writer();
    }

    /**
     * make Writer instance from path
     *
     * @param string $path
     * @return \YukataRm\File\Interface\WriterInterface
     */
    public function makeFrom(string $path): WriterInterface
    {
        return $this->make()->setPath($path);
    }

    /*----------------------------------------*
     * Write
     *----------------------------------------*/

    /**
     * write file
     *
     * @param string $path
     * @param mixed $content
     * @param bool $useFileAppend
     * @param bool $useLockEx
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function write(
        string $path,
        mixed $content,
        bool $useFileAppend = false,
        bool $useLockEx = false,
        int|null $mode = null,
        string|null $user = null,
        string|null $group = null
    ): bool {
        $writer = $this->makeFrom($path)->setContent($content);

        if ($useFileAppend) $writer->useFileAppend();
        if ($useLockEx) $writer->useLockEx();

        return $writer->write($mode, $user, $group);
    }
}
