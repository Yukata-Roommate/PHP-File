<?php

namespace YukataRm\File\Base\Interface;

use YukataRm\File\Interface\PathInfoInterface;
use YukataRm\File\Interface\OperatorInterface;

/**
 * Writer Interface
 * 
 * @package YukataRm\File\Base\Interface
 */
interface WriterInterface extends PathInfoInterface, OperatorInterface
{
    /*----------------------------------------*
     * Write
     *----------------------------------------*/

    /**
     * write file
     * 
     * @return bool
     */
    public function write(): bool;

    /**
     * write file as is
     * 
     * @param mixed $data
     * @return bool
     */
    public function writeAsIs(mixed $data): bool;

    /*----------------------------------------*
     * Flag
     *----------------------------------------*/

    /**
     * whether to use FILE_APPEND flag
     * 
     * @return bool
     */
    public function isUseFileAppend(): bool;

    /**
     * use FILE_APPEND flag
     * 
     * @return static
     */
    public function useFileAppend(): static;

    /**
     * not use FILE_APPEND flag
     * 
     * @return static
     */
    public function notUseFileAppend(): static;

    /**
     * whether to use LOCK_EX flag
     * 
     * @return bool
     */
    public function isUseLockEx(): bool;

    /**
     * use LOCK_EX flag
     * 
     * @return static
     */
    public function useLockEx(): static;

    /**
     * not use LOCK_EX flag
     * 
     * @return static
     */
    public function notUseLockEx(): static;
}
