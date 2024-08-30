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
     * @param int|null $mode
     * @param string|null $user
     * @param string|null $group
     * @return bool
     */
    public function create(int|null $mode = null, string|null $user = null, string|null $group = null): bool
    {
        if ($this->isExists()) return false;

        if (!$this->isDirExists()) $this->createDir();

        $result = touch($this->path());

        if (!$result) return false;

        return $this->chperm($mode, $user, $group);
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

        return unlink($this->path());
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

        $result = copy($this->path(), $copy->path());

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

        $result = rename($this->path(), $move->path());

        return $result ? $move : null;
    }

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
    public function chperm(int|null $mode = null, string|null $user = null, string|null $group = null): bool
    {
        if (!is_null($mode) && !$this->chmod($mode)) return false;

        if (!is_null($user) && !$this->chown($user)) return false;

        if (!is_null($group) && !$this->chgrp($group)) return false;

        return true;
    }

    /**
     * change file mode
     * 
     * @param int $mode
     * @return bool
     */
    public function chmod(int $mode): bool
    {
        return chmod($this->path(), $mode);
    }

    /**
     * change file owner
     * 
     * @param string $user
     * @return bool
     */
    public function chown(string $user): bool
    {
        return chown($this->path(), $user);
    }

    /**
     * change file group
     * 
     * @param string $group
     * @return bool
     */
    public function chgrp(string $group): bool
    {
        return chgrp($this->path(), $group);
    }
}
