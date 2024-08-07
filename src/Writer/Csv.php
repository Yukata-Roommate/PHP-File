<?php

namespace YukataRm\File\Writer;

use YukataRm\File\Writer\Interface\CsvInterface;
use YukataRm\File\Writer\BaseWriter;

/**
 * Csv Writer
 * 
 * @package YukataRm\File\Writer
 */
class Csv extends BaseWriter implements CsvInterface
{
    /*----------------------------------------*
     * Override
     *----------------------------------------*/

    /**
     * get data to write
     * 
     * @return array<array<string>>
     */
    #[\Override]
    protected function getData(): array
    {
        return array_merge([$this->headers()], $this->content());
    }

    /**
     * execute writing file
     * 
     * @param array<array<string>> $data
     * @return bool
     */
    #[\Override]
    protected function writeFile(mixed $data): bool
    {
        if (!is_array($data)) throw new \RuntimeException("data must be an array.");

        $stream = fopen("php://temp", "w");

        if ($stream === false) throw new \RuntimeException("failed to create stream.");

        $separator = $this->separator();
        $enclosure = $this->enclosure();
        $escape    = $this->escape();
        $eol       = $this->eol();

        foreach ($data as $line) {
            fputcsv(
                $stream,
                $line,
                $separator,
                $enclosure,
                $escape,
                $eol,
            );
        }

        rewind($stream);

        $contents = stream_get_contents($stream);

        fclose($stream);

        return parent::writeFile($contents);
    }

    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * content to write
     * 
     * @var array<array<string>>
     */
    protected array $content = [];

    /**
     * get content to write
     * 
     * @return array<array<string>>
     */
    public function content(): array
    {
        return $this->content;
    }

    /**
     * set content to write
     * 
     * @param array<array<string>> $content
     * @return static
     */
    public function setContent(array $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * add content to write
     * 
     * @param array<string> $content
     * @return static
     */
    public function addContent(array $content): static
    {
        $this->content[] = $content;

        return $this;
    }

    /*----------------------------------------*
     * Header
     *----------------------------------------*/

    /**
     * headers
     * 
     * @var array<string>
     */
    protected array $headers = [];

    /**
     * get headers
     * 
     * @return array<string>
     */
    public function headers(): array
    {
        return $this->headers;
    }

    /**
     * set headers
     * 
     * @param array<string> $content
     * @return static
     */
    public function setHeaders(array $content): static
    {
        $this->headers = $content;

        return $this;
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
     * eol
     * 
     * @var string
     */
    protected string $eol = "\n";

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

    /**
     * get eol
     * 
     * @return string
     */
    public function eol(): string
    {
        return $this->eol;
    }

    /**
     * set eol
     * 
     * @param string $eol
     * @return static
     */
    public function setEol(string $eol): static
    {
        $this->eol = $eol;

        return $this;
    }
}
