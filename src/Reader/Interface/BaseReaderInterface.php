<?php

namespace YukataRm\File\Reader\Interface;

use YukataRm\File\Interface\PathInfoInterface;
use YukataRm\File\Interface\OperatorInterface;

/**
 * Base Reader Interface
 * 
 * @package YukataRm\File\Reader\Interface
 */
interface BaseReaderInterface extends PathInfoInterface, OperatorInterface
{
    /*----------------------------------------*
     * Read
     *----------------------------------------*/

    /**
     * read file
     * 
     * @return string|null
     */
    public function read(): string|null;

    /*----------------------------------------*
     * Read - Line
     *----------------------------------------*/

    /**
     * read file by line
     * 
     * @param int $start
     * @return array|null
     */
    public function readByLine(int $start = 1): array|null;

    /**
     * read file line by line
     * 
     * @param int $start
     * @return \Generator|null
     */
    public function readLineByLine(int $start = 1): \Generator|null;

    /*----------------------------------------*
     * Read - Chunk
     *----------------------------------------*/

    /**
     * read file by chunk
     * 
     * @param int $row
     * @param int $start
     * @return array|null
     */
    public function readByChunk(int $row = 1, int $start = 1): array|null;

    /**
     * read file chunk by chunk
     * 
     * @param int $row
     * @param int $start
     * @return \Generator|null
     */
    public function readChunkByChunk(int $row = 1, int $start = 1): \Generator|null;
}
