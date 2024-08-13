<?php

namespace YukataRm\File\Proxy;

use YukataRm\File\Interface\PathInfoInterface;
use YukataRm\File\PathInfo;
use YukataRm\File\Interface\OperatorInterface;
use YukataRm\File\Operator;
use YukataRm\File\Interface\WriterInterface;
use YukataRm\File\Writer;
use YukataRm\File\Interface\ReaderInterface;
use YukataRm\File\Reader;

/**
 * Proxy Manager
 * 
 * @package YukataRm\File\Proxy\Manager
 */
class Manager
{
    /**
     * make PathInfo instance
     *
     * @return \YukataRm\File\Interface\PathInfoInterface
     */
    public function pathInfo(): PathInfoInterface
    {
        return new PathInfo();
    }

    /**
     * make Operator instance
     *
     * @return \YukataRm\File\Interface\OperatorInterface
     */
    public function operator(): OperatorInterface
    {
        return new Operator();
    }

    /**
     * make Writer instance
     *
     * @return \YukataRm\File\Interface\WriterInterface
     */
    public function writer(): WriterInterface
    {
        return new Writer();
    }

    /**
     * make Reader instance
     *
     * @return \YukataRm\File\Interface\ReaderInterface
     */
    public function reader(): ReaderInterface
    {
        return new Reader();
    }
}
