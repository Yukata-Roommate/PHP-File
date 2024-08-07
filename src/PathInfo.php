<?php

namespace YukataRm\File;

use YukataRm\File\Interface\PathInfoInterface;

/**
 * PathInfo
 * 
 * @package YukataRm\File
 */
class PathInfo implements PathInfoInterface
{
    /**
     * directory name
     * 
     * @var string
     */
    protected string $dirname = "";

    /**
     * file name and extension
     * 
     * @var string
     */
    protected string $basename = "";

    /**
     * file extension
     * 
     * @var string
     */
    protected string $extension = "";

    /**
     * file name
     *
     * @var string
     */
    protected string $filename = "";

    /*----------------------------------------*
     * Utilities
     *----------------------------------------*/

    /**
     * create path
     * 
     * @param string $dirname
     * @param string $basename
     * @return string
     */
    protected function createPath(string $dirname, string $basename): string
    {
        return $dirname . DIRECTORY_SEPARATOR . $basename;
    }

    /*----------------------------------------*
     * Setters
     *----------------------------------------*/

    /**
     * set path
     * 
     * @param string $path
     * @return static
     */
    public function setPath(string $path): static
    {
        $pathInfo = pathinfo($path);

        $this->dirname   = $pathInfo['dirname'];
        $this->basename  = $pathInfo['basename'];
        $this->extension = $pathInfo['extension'];
        $this->filename  = $pathInfo['filename'];

        return $this;
    }

    /**
     * set directory name
     * 
     * @param string $dirname
     * @return static
     */
    public function setDirname(string $dirname): static
    {
        return $this->setPath($this->createPath(
            $dirname,
            $this->basename()
        ));
    }

    /**
     * set file name and extension
     * 
     * @param string $basename
     * @return static
     */
    public function setBasename(string $basename): static
    {
        return $this->setPath($this->createPath(
            $this->dirname(),
            $basename
        ));
    }

    /**
     * set file extension
     * 
     * @param string $extension
     * @return static
     */
    public function setExtension(string $extension): static
    {
        return $this->setPath($this->createPath(
            $this->dirname(),
            $this->filename() . '.' . $extension
        ));
    }

    /**
     * set file name
     * 
     * @param string $filename
     * @return static
     */
    public function setFilename(string $filename): static
    {
        return $this->setPath($this->createPath(
            $this->dirname(),
            $filename . '.' . $this->extension()
        ));
    }

    /*----------------------------------------*
     * Info
     *----------------------------------------*/

    /**
     * get path
     * 
     * @return string
     */
    public function path(): string
    {
        return $this->createPath($this->dirname(), $this->basename());
    }

    /**
     * get directory name
     * 
     * @return string
     */
    public function dirname(): string
    {
        return $this->dirname;
    }

    /**
     * get file name and extension
     * 
     * @return string
     */
    public function basename(): string
    {
        return $this->basename;
    }

    /**
     * get file extension
     * 
     * @return string
     */
    public function extension(): string
    {
        return $this->extension;
    }

    /**
     * get file name
     * 
     * @return string
     */
    public function filename(): string
    {
        return $this->filename;
    }

    /*----------------------------------------*
     * Last Modified
     *----------------------------------------*/

    /**
     * get last modified time
     * 
     * @return int
     */
    public function lastModified(): int
    {
        $lastModified = filemtime($this->path());

        if ($lastModified === false) throw new \RuntimeException("failed to get last modified time.");

        return $lastModified;
    }

    /**
     * get last modified time as DateTime
     * 
     * @return \DateTime
     */
    public function lastModifiedDateTime(): \DateTime
    {
        $lastModified = $this->lastModified();

        return new \DateTime("@$lastModified");
    }

    /*----------------------------------------*
     * Size
     *----------------------------------------*/

    /**
     * get file size
     * 
     * @return int
     */
    public function size(): int
    {
        $size = filesize($this->path());

        if ($size === false) throw new \RuntimeException("failed to get file size.");

        return $size;
    }

    /**
     * get file size with unit
     * 
     * @return string
     */
    public function sizeString(): string
    {
        return $this->size() . ' bytes';
    }

    /**
     * get file size in kilobytes
     * 
     * @return float
     */
    public function sizeKb(): float
    {
        return $this->size() / 1024;
    }

    /**
     * get file size in kilobytes with unit
     * 
     * @return string
     */
    public function sizeKbString(): string
    {
        return $this->sizeKb() . ' KB';
    }

    /**
     * get file size in megabytes
     * 
     * @return float
     */
    public function sizeMb(): float
    {
        return $this->sizeKb() / 1024;
    }

    /**
     * get file size in megabytes with unit
     * 
     * @return string
     */
    public function sizeMbString(): string
    {
        return $this->sizeMb() . ' MB';
    }

    /**
     * get file size in gigabytes
     * 
     * @return float
     */
    public function sizeGb(): float
    {
        return $this->sizeMb() / 1024;
    }

    /**
     * get file size in gigabytes with unit
     * 
     * @return string
     */
    public function sizeGbString(): string
    {
        return $this->sizeGb() . ' GB';
    }

    /*----------------------------------------*
     * Permission
     *----------------------------------------*/

    /**
     * get file mode
     * 
     * @return string
     */
    public function mode(): string
    {
        $mode = fileperms($this->path());

        if ($mode === false) throw new \RuntimeException("failed to get file mode.");

        return substr(sprintf('%o', $mode), -4);
    }

    /**
     * get file owner
     * 
     * @return string
     */
    public function owner(): string
    {
        $owner = fileowner($this->path());

        if ($owner === false) throw new \RuntimeException("failed to get file owner.");

        $pwuid = posix_getpwuid($owner);

        if ($pwuid === false) throw new \RuntimeException("failed to get file owner information.");

        return $pwuid['name'];
    }

    /**
     * get file group
     * 
     * @return string
     */
    public function group(): string
    {
        $group = filegroup($this->path());

        if ($group === false) throw new \RuntimeException("failed to get file group.");

        $grgid = posix_getgrgid($group);

        if ($grgid === false) throw new \RuntimeException("failed to get file group information.");

        return $grgid['name'];
    }

    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * whether file exists
     * 
     * @return bool
     */
    public function isExists(): bool
    {
        return file_exists($this->path());
    }

    /**
     * whether directory exists
     * 
     * @return bool
     */
    public function isDirExists(): bool
    {
        return is_dir($this->dirname);
    }

    /**
     * whether file is directory
     * 
     * @return bool
     */
    public function isDir(): bool
    {
        return is_dir($this->path());
    }

    /**
     * whether file is regular file
     * 
     * @return bool
     */
    public function isFile(): bool
    {
        return is_file($this->path());
    }

    /**
     * whether file is link
     * 
     * @return bool
     */
    public function isLink(): bool
    {
        return is_link($this->path());
    }

    /**
     * whether file is readable
     * 
     * @return bool
     */
    public function isReadable(): bool
    {
        return is_readable($this->path());
    }

    /**
     * whether file is writable
     * 
     * @return bool
     */
    public function isWritable(): bool
    {
        return is_writable($this->path());
    }

    /**
     * whether file is executable
     * 
     * @return bool
     */
    public function isExecutable(): bool
    {
        return is_executable($this->path());
    }
}
