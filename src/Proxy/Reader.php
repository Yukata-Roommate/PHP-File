<?php

namespace YukataRm\File\Proxy;

use YukataRm\StaticProxy\StaticProxy;

use YukataRm\File\Proxy\Manager\ReaderManager as Manager;

/**
 * Reader Proxy
 * 
 * @package YukataRm\File\Proxy
 * 
 * @method static \YukataRm\File\Interface\ReaderInterface make()
 * @method static \YukataRm\File\Interface\ReaderInterface makeFrom(string $path)
 * 
 * @method static string|null read(string $path)
 * 
 * @method static array|null readByLine(string $path, int $start = 1)
 * @method static \Generator|null readLineByLine(string $path, int $start = 1)
 * 
 * @method static array|null readByChunk(string $path, int $row = 1, int $start = 1)
 * @method static \Generator|null readChunkByChunk(string $path, int $row = 1, int $start = 1)
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
        return Manager::class;
    }
}
