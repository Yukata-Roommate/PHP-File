<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\PathInfoManager as Manager;

/**
 * PathInfo Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Interface\PathInfoInterface make()
 * @method static \YukataRm\File\Interface\PathInfoInterface makeFrom(string $path)
 * 
 * @method static string dirname(string $path)
 * @method static string basename(string $path)
 * @method static string extension(string $path)
 * @method static string filename(string $path)
 * 
 * @method static int lastModified(string $path)
 * @method static \DateTime lastModifiedDateTime(string $path)
 * 
 * @method static int size(string $path)
 * @method static string sizeString(string $path)
 * @method static float sizeKb(string $path)
 * @method static string sizeKbString(string $path)
 * @method static float sizeMb(string $path)
 * @method static string sizeMbString(string $path)
 * @method static float sizeGb(string $path)
 * @method static string sizeGbString(string $path)
 * 
 * @method static string mode(string $path)
 * @method static string owner(string $path)
 * @method static string group(string $path)
 * 
 * @method static bool isExists(string $path)
 * @method static bool isDirExists(string $path)
 * @method static bool isDir(string $path)
 * @method static bool isFile(string $path)
 * @method static bool isLink(string $path)
 * @method static bool isReadable(string $path)
 * @method static bool isWritable(string $path)
 * @method static bool isExecutable(string $path)
 * 
 * @see \YukataRm\File\Proxy\Manager\PathInfoManager
 */
class PathInfo extends StaticProxy
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
