<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Falaleev Maxim
 * @email max@studio107.ru
 * @version 1.0
 * @company Studio107
 * @site http://studio107.ru
 * @date 02/04/14.04.2014 14:38
 */

namespace Mindy\Finder;

use Exception;

/**
 * Class Finder
 * @package Mindy\Finder
 */
class Finder
{
    /**
     * @var TemplateFinder[]
     */
    public $finders = [];

    public function __construct(array $finders = [])
    {
        foreach ($finders as $finder) {
            if (($finder instanceof BaseTemplateFinder) === false) {
                throw new Exception("Unknown template finder");
            }
            $this->finders[] = $finder;
        }
    }

    public function find($templatePath)
    {
        $templates = [];
        foreach ($this->finders as $finder) {
            $template = $finder->find($templatePath);
            if ($template !== null) {
                $templates[] = $template;
            }
        }

        // TODO log $templates

        return array_shift($templates);
    }

    public function getPaths()
    {
        $paths = [];
        foreach ($this->finders as $finder) {
            $paths = array_merge($paths, $finder->getPaths());
        }

        return $paths;
    }
}
