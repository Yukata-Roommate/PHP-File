<?php

namespace YukataRm\File\Interface;

use YukataRm\File\Interface\PathInfoInterface;

/**
 * Operator Interface
 * 
 * @package YukataRm\File\Interface
 */
interface OperatorInterface extends PathInfoInterface
{
    /*----------------------------------------*
     * Create
     *----------------------------------------*/

    /**
     * create file
     * 
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function create(int|null $mode = null, string|null $user = null, string|null $group = null): bool;

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove file
     * 
     * @return bool
     */
    public function remove(): bool;

    /*----------------------------------------*
     * Copy
     *----------------------------------------*/

    /**
     * copy file
     * 
     * @param string $destination
     * @return static|null
     */
    public function copy(string $destination): static|null;

    /*----------------------------------------*
     * Move
     *----------------------------------------*/

    /**
     * move file
     * 
     * @param string $destination
     * @return static|null
     */
    public function move(string $destination): static|null;

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * change file permissions
     * 
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function chperm(int|null $mode = null, string|null $user = null, string|null $group = null): bool;

    /**
     * change file mode
     * 
     * @param int $mode
     * @return bool
     */
    public function chmod(int $mode): bool;

    /**
     * change file owner
     * 
     * @param string $user
     * @return bool
     */
    public function chown(string $user): bool;

    /**
     * change file group
     * 
     * @param string $group
     * @return bool
     */
    public function chgrp(string $group): bool;
}
