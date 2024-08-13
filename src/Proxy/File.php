<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager;

/**
 * File Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Interface\PathInfoInterface pathInfo()
 * @method static \YukataRm\File\Interface\OperatorInterface operator()
 * @method static \YukataRm\File\Interface\WriterInterface writer()
 * @method static \YukataRm\File\Interface\ReaderInterface reader()
 * 
 * @see \YukataRm\File\Proxy\Manager
 */
class File extends StaticProxy
{
    /** 
     * get class name calling dynamic method
     * 
     * @return string 
     */
    protected static function getCallableClassName(): string
    {
        return Manager::class;
    }
}
