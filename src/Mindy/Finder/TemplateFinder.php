<?php

/**
 * All rights reserved.
 *
 * @author Falaleev Maxim
 * @email max@studio107.ru
 * @version 1.0
 * @company Studio107
 * @site http://studio107.ru
 * @date 02/04/14.04.2014 11:44
 */

namespace Mindy\Finder;

class TemplateFinder extends BaseTemplateFinder
{
    public $templatesDir = 'templates';

    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @param $templatePath
     * @return null|string absolute path of template if founded
     */
    public function find($templatePath)
    {
        $path = join(DIRECTORY_SEPARATOR, [$this->basePath, $this->templatesDir, $templatePath]);
        if(is_file($path)) {
            return $path;
        }

        return null;
    }

    /**
     * @return array of available template paths
     */
    public function getPaths()
    {
        return [
            join(DIRECTORY_SEPARATOR, [$this->basePath, $this->templatesDir])
        ];
    }
}
