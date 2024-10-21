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
     * @return static|null
     */
    public function create(string $path): static|null
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
     * @return static|null
     */
    public function copy(string $source, string $destination): static|null
    {
        return $this->makeFrom($source)->copy($destination);
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
    public function move(string $source, string $destination): static|null
    {
        return $this->makeFrom($source)->move($destination);
    }

    /*----------------------------------------*
     * Compress
     *----------------------------------------*/

    /**
     * zip file
     *
     * @param string $path
     * @param string|null $destination
     * @return static|null
     */
    public function zip(string $path, string|null $destination = null): static|null
    {
        return $this->makeFrom($path)->zip($destination);
    }

    /**
     * unzip file
     *
     * @param string $path
     * @param string|null $destination
     * @return static|array<static>|null
     */
    public function unzip(string $path, string|null $destination = null): static|array|null
    {
        return $this->makeFrom($path)->unzip($destination);
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
