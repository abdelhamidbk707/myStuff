<?php


namespace App\Event;

use Symfony\Component\Form\FormInterface;
use Symfony\Contracts\EventDispatcher\Event;

class FormEvent extends Event
{

    public $type;
    public $data;
    public $options;

    /**
     * @var FormInterface
     */
    public $form;

    /**
     * FormEvent constructor.
     * @param $type
     * @param $data
     * @param $options
     */
    public function __construct($type, $data, $options)
    {
        $this->type = $type;
        $this->data = $data;
        $this->options = $options;
    }

    public function getForm()
    {
        $this->form;
    }
}