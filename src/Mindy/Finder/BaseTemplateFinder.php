<?php
/**
 * All rights reserved.
 *
 * @author Falaleev Maxim
 * @email max@studio107.ru
 * @version 1.0
 * @company Studio107
 * @site http://studio107.ru
 * @date 02/04/14.04.2014 11:43
 */

namespace Mindy\Finder;

abstract class BaseTemplateFinder
{
    public $basePath;

    /**
     * @param $templatePath
     * @return null|string absolute path of template if founded
     */
    abstract public function find($templatePath);

    /**
     * @return array of available template paths
     */
    abstract public function getPaths();
}
