<?php

namespace YukataRm\File\Writer\Interface;

use YukataRm\File\Writer\Interface\BaseWriterInterface;

/**
 * Common Writer Interface
 * 
 * @package YukataRm\File\Writer\Interface
 */
interface CommonInterface extends BaseWriterInterface
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
