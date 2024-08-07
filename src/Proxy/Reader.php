<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\ReaderManager;

/**
 * Reader Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Reader\Interface\CommonInterface common()
 * @method static \YukataRm\File\Reader\Interface\CsvInterface csv()
 * 
 * @see \YukataRm\File\Proxy\Manager\ReaderManager
 */
class Reader extends StaticProxy
{
    /** 
     * get class name calling dynamic method
     * 
     * @return string 
     */
    protected static function getCallableClassName(): string
    {
        return ReaderManager::class;
    }
}
