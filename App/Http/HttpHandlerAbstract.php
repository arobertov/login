<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 20:17
 */

namespace App\Http;


use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    public function render(string $templateName,$data=null){
       return $this->template->render($templateName,$data);
    }

    public function redirect($url){
       header("Location: $url");
       exit;
    }
}