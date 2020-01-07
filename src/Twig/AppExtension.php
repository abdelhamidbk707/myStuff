<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigBootstrapExtension extends AbstractExtension
{
    public function getFilters(){
        return [new TwigFilter('button' ,[$this, 'buttonFilter'], ['is_secure' => ['html']])];
    }

    public function buttonFilter(string $name){
        return "<button title='".$name."'></button>";
    }
}