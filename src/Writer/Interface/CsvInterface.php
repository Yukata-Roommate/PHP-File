<?php

namespace YukataRm\File\Writer\Interface;

use YukataRm\File\Writer\Interface\BaseWriterInterface;

/**
 * Csv Writer Interface
 * 
 * @package YukataRm\File\Writer\Interface
 */
interface CsvInterface extends BaseWriterInterface
{
    /*----------------------------------------*
     * Content
     *----------------------------------------*/

    /**
     * get content to write
     * 
     * @return array<array<string>>
     */
    public function content(): array;

    /**
     * set content to write
     * 
     * @param array<array<string>> $content
     * @return static
     */
    public function setContent(array $content): static;

    /**
     * add content to write
     * 
     * @param array<string> $content
     * @return static
     */
    public function addContent(array $content): static;

    /*----------------------------------------*
     * Header
     *----------------------------------------*/

    /**
     * get headers
     * 
     * @return array<string>
     */
    public function headers(): array;

    /**
     * set headers
     * 
     * @param array<string> $content
     * @return static
     */
    public function setHeaders(array $content): static;

    /*----------------------------------------*
     * Format
     *----------------------------------------*/

    /**
     * get separator
     * 
     * @return string
     */
    public function separator(): string;

    /**
     * set separator
     * 
     * @param string $separator
     * @return static
     */
    public function setSeparator(string $separator): static;

    /**
     * get enclosure
     * 
     * @return string
     */
    public function enclosure(): string;

    /**
     * set enclosure
     * 
     * @param string $enclosure
     * @return static
     */
    public function setEnclosure(string $enclosure): static;

    /**
     * get escape
     * 
     * @return string
     */
    public function escape(): string;

    /**
     * set escape
     * 
     * @param string $escape
     * @return static
     */
    public function setEscape(string $escape): static;

    /**
     * get eol
     * 
     * @return string
     */
    public function eol(): string;

    /**
     * set eol
     * 
     * @param string $eol
     * @return static
     */
    public function setEol(string $eol): static;
}
