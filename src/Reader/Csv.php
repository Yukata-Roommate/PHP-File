<?php

namespace YukataRm\File\Reader;

use YukataRm\File\Reader\Interface\CsvInterface;
use YukataRm\File\Reader\BaseReader;

/**
 * Csv Reader
 * 
 * @package YukataRm\File\Reader
 */
class Csv extends BaseReader implements CsvInterface
{
    /*----------------------------------------*
     * Read - Line
     *----------------------------------------*/

    /**
     * get file data
     * 
     * @param \SplFileObject $file
     * @return mixed
     */
    protected function getFileData(\SplFileObject $file): mixed
    {
        return $file->fgetcsv(
            $this->separator(),
            $this->enclosure(),
            $this->escape()
        );
    }

    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * separator
     * 
     * @var string
     */
    protected string $separator = ",";

    /**
     * enclosure
     * 
     * @var string
     */
    protected string $enclosure = "\"";

    /**
     * escape
     * 
     * @var string
     */
    protected string $escape = "\\";

    /**
     * get separator
     * 
     * @return string
     */
    public function separator(): string
    {
        return $this->separator;
    }

    /**
     * set separator
     * 
     * @param string $separator
     * @return static
     */
    public function setSeparator(string $separator): static
    {
        $this->separator = $separator;

        return $this;
    }

    /**
     * get enclosure
     * 
     * @return string
     */
    public function enclosure(): string
    {
        return $this->enclosure;
    }

    /**
     * set enclosure
     * 
     * @param string $enclosure
     * @return static
     */
    public function setEnclosure(string $enclosure): static
    {
        $this->enclosure = $enclosure;

        return $this;
    }

    /**
     * get escape
     * 
     * @return string
     */
    public function escape(): string
    {
        return $this->escape;
    }

    /**
     * set escape
     * 
     * @param string $escape
     * @return static
     */
    public function setEscape(string $escape): static
    {
        $this->escape = $escape;

        return $this;
    }
}
