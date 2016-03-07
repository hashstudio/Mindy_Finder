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

class AppTemplateFinder extends TemplateFinder
{
    public $modulesDirs = [];

    public function __construct($basePath, array $modulesDirs)
    {
        parent::__construct($basePath);
        $this->modulesDirs = $modulesDirs;
    }

    /**
     * @param $templatePath
     * @return null|string absolute path of template if founded
     */
    public function find($templatePath)
    {
        $tmp = explode(DIRECTORY_SEPARATOR, $templatePath);
        if(count($tmp) > 1) {
            $app = ucfirst(array_shift($tmp));

            foreach($this->modulesDirs as $dir) {
                $path = join(DIRECTORY_SEPARATOR, [$dir, $app, $this->templatesDir, $templatePath]);
                if(is_file($path)) {
                    return $path;
                }
            }
        }

        return null;
    }

    /**
     * @return array of available template paths
     */
    public function getPaths()
    {
        $paths = [];
        foreach($this->modulesDirs as $dir) {
            $extra = glob($dir . DIRECTORY_SEPARATOR . '*' . DIRECTORY_SEPARATOR . $this->templatesDir);
            if(!$extra) {
                continue;
            }
            $paths = array_merge($paths, $extra);
        }
        return $paths;
    }
}
