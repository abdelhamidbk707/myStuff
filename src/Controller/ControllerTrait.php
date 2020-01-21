<?php

namespace App\Controller;

use App\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;

trait ControllerTrait
{
    /**
     * @var EventDispatcher
     */
    protected $eventDispatcher;

    /**
     * ControllerTrait constructor.
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param $view
     * @param array $parameters
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function render($view, $parameters = [])
    {
        $templateEvent = new TemplateEvent($view, $parameters);
        $this->eventDispatcher->dispatch($templateEvent, 'renderView');
        $response = new Response();
        return $response->setContent($templateEvent->getResponse());
    }
}