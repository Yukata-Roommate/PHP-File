<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\FileManager;

/**
 * File Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Interface\PathInfoInterface pathInfo()
 * @method static \YukataRm\File\Interface\OperatorInterface operator()
 * 
 * @see \YukataRm\File\Proxy\Manager\FileManager
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
        return FileManager::class;
    }
}
