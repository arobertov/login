<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 18:45
 */

namespace Core;


class Template implements TemplateInterface
{

    public function render(string $templateName, $data=null)
    {
        require_once 'App/Templates/'.$templateName.'.php';
    }
}