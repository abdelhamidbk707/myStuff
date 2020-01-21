<?php

namespace App\EventListener;

use Symfony\Bundle\TwigBundle\DependencyInjection\TwigExtension;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use App\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TemplateEventListener implements EventSubscriberInterface
{

    /**
     * @var Environment
     */
    public $template;

    /**
     * TemplateEventListener constructor.
     * @param Environment $template
     */
    public function __construct(Environment $template)
    {
        $this->template = $template;
    }


    public static function getSubscribedEvents()
    {
      return [
        'renderView' => 'renderContent'
      ];
    }

    /**
     * @param TemplateEvent $event
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function renderContent(TemplateEvent $event)
    {
        $parameters = $event->getParameters();
        $view = $event->getView();
        $content = $this->template->render($view, $parameters);
        $event->setResponse($content);
    }
}