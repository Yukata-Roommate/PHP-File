<?php

namespace YukataRm\File;

use YukataRm\File\Interface\OperatorInterface;
use YukataRm\File\PathInfo;

/**
 * Operator
 * 
 * @package YukataRm\File
 */
class Operator extends PathInfo implements OperatorInterface
{
    /*----------------------------------------*
     * Create
     *----------------------------------------*/

    /**
     * create file
     * 
     * @return bool
     */
    public function create(): bool
    {
        if ($this->isExists()) return false;

        if (!$this->isDirExists()) $this->createDir();

        return touch($this->realpath());
    }

    /**
     * create directory
     * 
     * @return bool
     */
    protected function createDir(): bool
    {
        if ($this->isDirExists()) return false;

        return mkdir($this->dirname(), 0755, true);
    }

    /*----------------------------------------*
     * Remove
     *----------------------------------------*/

    /**
     * remove file
     * 
     * @return bool
     */
    public function remove(): bool
    {
        if (!$this->isExists()) return false;

        return unlink($this->realpath());
    }

    /*----------------------------------------*
     * Copy
     *----------------------------------------*/

    /**
     * copy file
     * 
     * @param string $destination
     * @return static|null
     */
    public function copy(string $destination): static|null
    {
        $copy = new static();

        $copy->setPath($destination);

        if ($copy->isExists()) return false;

        if (!$copy->isDirExists()) $copy->createDir();

        $result = copy($this->realpath(), $copy->realpath());

        return $result ? $copy : null;
    }

    /*----------------------------------------*
     * Move
     *----------------------------------------*/

    /**
     * move file
     * 
     * @param string $destination
     * @return static|null
     */
    public function move(string $destination): static|null
    {
        $move = new static();

        $move->setPath($destination);

        if ($move->isExists()) return false;

        if (!$move->isDirExists()) $move->createDir();

        $result = rename($this->realpath(), $move->realpath());

        return $result ? $move : null;
    }

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * set file mode
     * 
     * @param int $mode
     * @return bool
     */
    public function chmod(int $mode): bool
    {
        return chmod($this->realpath(), $mode);
    }

    /**
     * set file owner
     * 
     * @param string $user
     * @return bool
     */
    public function chown(string $user): bool
    {
        return chown($this->realpath(), $user);
    }

    /**
     * set file group
     * 
     * @param string $group
     * @return bool
     */
    public function chgrp(string $group): bool
    {
        return chgrp($this->realpath(), $group);
    }
}
