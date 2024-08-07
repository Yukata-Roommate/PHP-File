<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\WriterManager;

/**
 * Writer Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Writer\Interface\CommonInterface common()
 * @method static \YukataRm\File\Writer\Interface\CsvInterface csv()
 * @method static \YukataRm\File\Writer\Interface\MarkdownInterface markdown()
 * 
 * @see \YukataRm\File\Proxy\Manager\WriterManager
 */
class Writer extends StaticProxy
{
    /** 
     * get class name calling dynamic method
     * 
     * @return string 
     */
    protected static function getCallableClassName(): string
    {
        return WriterManager::class;
    }
}
