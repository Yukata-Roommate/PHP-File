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
     * @return bool
     */
    public function create(): bool;

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
     * set file mode
     * 
     * @param int $mode
     * @return bool
     */
    public function chmod(int $mode): bool;

    /**
     * set file owner
     * 
     * @param string $user
     * @return bool
     */
    public function chown(string $user): bool;

    /**
     * set file group
     * 
     * @param string $group
     * @return bool
     */
    public function chgrp(string $group): bool;
}
