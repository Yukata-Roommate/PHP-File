<?php

namespace YukataRm\File\Proxy\Manager;

use YukataRm\File\Interface;
use YukataRm\File;

/**
 * File Proxy Manager
 * 
 * @package YukataRm\File\Proxy\Manager
 */
class FileManager
{
    /**
     * make PathInfo instance
     *
     * @return \YukataRm\File\Interface\PathInfoInterface
     */
    public function pathInfo(): Interface\PathInfoInterface
    {
        return new File\PathInfo();
    }

    /**
     * make Operator instance
     *
     * @return \YukataRm\File\Interface\OperatorInterface
     */
    public function operator(): Interface\OperatorInterface
    {
        return new File\Operator();
    }
}
