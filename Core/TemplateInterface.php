<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 18:42
 */

namespace Core;


interface TemplateInterface
{
    public function render(string  $templateName,$data);
}