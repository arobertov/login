<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.11.2017 г.
 * Time: 20:17
 */

namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;
use Database\DatabaseInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

	/**
	 * @var DatabaseInterface 
	 */
    protected $dataBinder;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     */
    public function __construct(TemplateInterface $template,DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
    }

    public function render(string $templateName,$data=null){
       return $this->template->render($templateName,$data);
    }

    public function redirect($url){
       header("Location: $url");
       exit;
    }
}