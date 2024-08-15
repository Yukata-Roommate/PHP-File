<?php

namespace YukataRm\File\Interface;

use YukataRm\File\Base\Interface\WriterInterface as BaseWriterInterface;

/**
 * Writer Interface
 * 
 * @package YukataRm\File\Interface
 */
interface WriterInterface extends BaseWriterInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * get content to write
     * 
     * @return mixed
     */
    public function content(): mixed;

    /**
     * set content to write
     * 
     * @param mixed $content
     * @return static
     */
    public function setContent(mixed $content): static;
}
