<?php

namespace YukataRm\File\Writer;

use YukataRm\File\Writer\Interface\CommonInterface;
use YukataRm\File\Writer\BaseWriter;

/**
 * Common Writer
 * 
 * @package YukataRm\File\Writer
 */
class Common extends BaseWriter implements CommonInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * content to write
     * 
     * @var mixed
     */
    protected mixed $content = null;

    /**
     * get content to write
     * 
     * @return mixed
     */
    public function content(): mixed
    {
        return $this->content;
    }

    /**
     * set content to write
     * 
     * @param mixed $content
     * @return static
     */
    public function setContent(mixed $content): static
    {
        $this->content = $content;

        return $this;
    }
}
