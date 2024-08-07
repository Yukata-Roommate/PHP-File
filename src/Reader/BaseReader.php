<?php

namespace YukataRm\File\Reader;

use YukataRm\File\Reader\Interface\BaseReaderInterface;
use YukataRm\File\Operator;

/**
 * Base Reader
 * 
 * @package YukataRm\File\Reader
 */
abstract class BaseReader extends Operator implements BaseReaderInterface
{
    /*----------------------------------------*
     * Read
     *----------------------------------------*/

    /**
     * read file
     * 
     * @return string|null
     */
    public function read(): string|null
    {
        if (!$this->isExists()) return null;

        $data = file_get_contents($this->path());

        return is_string($data) ? $data : null;
    }

    /*----------------------------------------*
     * Read - Line
     *----------------------------------------*/

    /**
     * read file by line
     * 
     * @param int $start
     * @return array|null
     */
    public function readByLine(int $start = 1): array|null
    {
        if (!$this->isExists()) return null;

        $data = file($this->path(), FILE_IGNORE_NEW_LINES);

        if (!is_array($data)) return null;

        return array_slice($data, $start - 1);
    }

    /**
     * read file line by line
     * 
     * @param int $start
     * @return \Generator|null
     */
    public function readLineByLine(int $start = 1): \Generator|null
    {
        if (!$this->isExists()) return null;

        $file = new \SplFileObject($this->path(), 'r');

        if (!$file) return null;

        $loop = 0;

        while (!$file->eof()) {
            $loop++;

            $line = $this->getFileData($file);

            if ($loop < $start) continue;

            yield $line;
        }
    }

    /**
     * get file data
     * 
     * @param \SplFileObject $file
     * @return mixed
     */
    abstract protected function getFileData(\SplFileObject $file): mixed;



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
    public function readByChunk(int $row = 1, int $start = 1): array|null
    {
        $data = $this->readByLine($start);

        return is_array($data) ? array_chunk($data, $row) : null;
    }

    /**
     * read file chunk by chunk
     * 
     * @param int $row
     * @param int $start
     * @return \Generator|null
     */
    public function readChunkByChunk(int $row = 1, int $start = 1): \Generator|null
    {
        if (!$this->isExists()) return null;

        $chunk = [];

        foreach ($this->readLineByLine($start) as $line) {
            $chunk[] = $line;

            if (count($chunk) < $row) continue;

            yield $chunk;

            $chunk = [];
        }
    }
}
