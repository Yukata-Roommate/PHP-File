<?php

namespace YukataRm\File\Proxy\Manager;

use YukataRm\File\Writer\Interface;
use YukataRm\File\Writer;

/**
 * Writer Proxy Manager
 * 
 * @package YukataRm\File\Proxy\Manager
 */
class WriterManager
{
    /**
     * make Common Writer instance
     * 
     * @return \YukataRm\File\Writer\Interface\CommonInterface
     */
    public function common(): Interface\CommonInterface
    {
        return new Writer\Common();
    }

    /**
     * make Csv Writer instance
     * 
     * @return \YukataRm\File\Writer\Interface\CsvInterface
     */
    public function csv(): Interface\CsvInterface
    {
        return new Writer\Csv();
    }

    /**
     * make Markdown Writer instance
     * 
     * @return \YukataRm\File\Writer\Interface\MarkdownInterface
     */
    public function markdown(): Interface\MarkdownInterface
    {
        return new Writer\Markdown();
    }
}
