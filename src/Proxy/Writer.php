<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\WriterManager as Manager;

/**
 * Writer Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Interface\WriterInterface make()
 * @method static \YukataRm\File\Interface\WriterInterface makeFrom(string $path)
 * 
 * @method static bool write(string $path, mixed $content, bool $useFileAppend = false, bool $useLockEx = false)
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
        return Manager::class;
    }
}
