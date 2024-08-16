<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\OperatorManager as Manager;

/**
 * Operator Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Interface\OperatorInterface make()
 * @method static \YukataRm\File\Interface\OperatorInterface makeFrom(string $path)
 * 
 * @method static bool create(string $path)
 * 
 * @method static bool remove(string $path)
 * 
 * @method static bool copy(string $source, string $destination)
 * 
 * @method static bool move(string $source, string $destination)
 * 
 * @method static bool chmod(string $path, int $mode)
 * @method static bool chown(string $path, string $user)
 * @method static bool chgrp(string $path, string $group)
 * 
 * @see \YukataRm\File\Proxy\Manager\OperatorManager
 */
class Operator extends StaticProxy
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
