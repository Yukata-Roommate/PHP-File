<?php

namespace YukataRm\File\Proxy\Manager;

use YukataRm\File\Interface\OperatorInterface;
use YukataRm\File\Operator;

/**
 * Operator Proxy Manager
 * 
 * @package YukataRm\File\Proxy\Manager
 */
class OperatorManager
{
    /*----------------------------------------*
     * Make
     *----------------------------------------*/

    /**
     * make Operator instance
     *
     * @return \YukataRm\File\Interface\OperatorInterface
     */
    public function make(): OperatorInterface
    {
        return new Operator();
    }

    /**
     * make Operator instance from path
     * 
     * @param string $path
     * @return \YukataRm\File\Interface\OperatorInterface
     */
    public function makeFrom(string $path): OperatorInterface
    {
        return $this->make()->setPath($path);
    }

    /*----------------------------------------*
     * Create
     *----------------------------------------*/

    /**
     * create file
     * 
     * @param string $path
     * @return bool
     */
    public function create(string $path): bool
    {
        return $this->makeFrom($path)->create();
    }

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove file
     * 
     * @param string $path
     * @return bool
     */
    public function remove(string $path): bool
    {
        return $this->makeFrom($path)->remove();
    }

    /*----------------------------------------*
     * Copy
     *----------------------------------------*/

    /**
     * copy file
     * 
     * @param string $source
     * @param string $destination
     * @return bool
     */
    public function copy(string $source, string $destination): bool
    {
        $instance = $this->makeFrom($source)->copy($destination);

        return !is_null($instance);
    }

    /*----------------------------------------*
     * Move
     *----------------------------------------*/

    /**
     * move file
     * 
     * @param string $source
     * @param string $destination
     * @return bool
     */
    public function move(string $source, string $destination): bool
    {
        $instance = $this->makeFrom($source)->move($destination);

        return !is_null($instance);
    }

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * set file mode
     * 
     * @param string $path
     * @param int $mode
     * @return bool
     */
    public function chmod(string $path, int $mode): bool
    {
        return $this->makeFrom($path)->chmod($mode);
    }

    /**
     * set file owner
     * 
     * @param string $path
     * @param string $user
     * @return bool
     */
    public function chown(string $path, string $user): bool
    {
        return $this->makeFrom($path)->chown($user);
    }

    /**
     * set file group
     * 
     * @param string $path
     * @param string $group
     * @return bool
     */
    public function chgrp(string $path, string $group): bool
    {
        return $this->makeFrom($path)->chgrp($group);
    }
}
