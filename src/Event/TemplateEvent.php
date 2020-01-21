<?php

namespace App\Event;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\EventDispatcher\Event;

class TemplateEvent extends Event
{

    public $view;
    public $parameters;

    /**
     * @var mixed
     */
    public $response;

    /**
     * TemplateEvent constructor.
     * @param $view
     * @param $parameters
     */
    public function __construct($view, $parameters = [])
    {
        $this->view = $view;
        $this->parameters = $parameters;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getView()
    {
        return $this->view;
    }
}