<?php

namespace YukataRm\File\Writer;

use YukataRm\File\Writer\Interface\BaseWriterInterface;
use YukataRm\File\Operator;

/**
 * Base Writer
 * 
 * @package YukataRm\File\Writer
 */
abstract class BaseWriter extends Operator implements BaseWriterInterface
{
    /*----------------------------------------*
     * Write
     *----------------------------------------*/

    /**
     * write file
     * 
     * @return bool
     */
    public function write(): bool
    {
        $this->createIfNotExists();

        $data = $this->getData();

        return $this->writeFile($data);
    }

    /**
     * write file as is
     * 
     * @param mixed $data
     * @return bool
     */
    public function writeAsIs(mixed $data): bool
    {
        $this->createIfNotExists();

        return $this->writeFile($data);
    }

    /**
     * create file if not exists
     * 
     * @return bool
     */
    protected function createIfNotExists(): bool
    {
        if ($this->isExists()) return true;

        return $this->create();
    }

    /**
     * get data to write
     * 
     * @return mixed
     */
    protected function getData(): mixed
    {
        return $this->content();
    }

    /**
     * execute writing file
     * 
     * @param mixed $data
     * @return bool
     */
    protected function writeFile(mixed $data): bool
    {
        $result = file_put_contents(
            $this->path(),
            $data,
            $this->flag(),
        );

        return $result !== false;
    }

    /*----------------------------------------*
     * Flag
     *----------------------------------------*/

    /**
     * whether to use FILE_APPEND flag
     * 
     * @var bool
     */
    protected bool $useFileAppend = false;

    /**
     * whether to use LOCK_EX flag
     * 
     * @var bool
     */
    protected bool $useLockEx = false;

    /**
     * get flag
     * 
     * @return int
     */
    protected function flag(): int
    {
        return match (true) {
            $this->useFileAppend && $this->useLockEx => FILE_APPEND | LOCK_EX,
            $this->useFileAppend                     => FILE_APPEND,
            $this->useLockEx                         => LOCK_EX,
            default                                  => 0,
        };
    }

    /**
     * whether to use FILE_APPEND flag
     * 
     * @return bool
     */
    public function isUseFileAppend(): bool
    {
        return $this->useFileAppend;
    }

    /**
     * use FILE_APPEND flag
     * 
     * @return static
     */
    public function useFileAppend(): static
    {
        $this->useFileAppend = true;

        return $this;
    }

    /**
     * not use FILE_APPEND flag
     * 
     * @return static
     */
    public function notUseFileAppend(): static
    {
        $this->useFileAppend = false;

        return $this;
    }

    /**
     * whether to use LOCK_EX flag
     * 
     * @return bool
     */
    public function isUseLockEx(): bool
    {
        return $this->useLockEx;
    }

    /**
     * use LOCK_EX flag
     * 
     * @return static
     */
    public function useLockEx(): static
    {
        $this->useLockEx = true;

        return $this;
    }

    /**
     * not use LOCK_EX flag
     * 
     * @return static
     */
    public function notUseLockEx(): static
    {
        $this->useLockEx = false;

        return $this;
    }

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * get content to write
     * 
     * @return mixed
     */
    abstract public function content(): mixed;
}
