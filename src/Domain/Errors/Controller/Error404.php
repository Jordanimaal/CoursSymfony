<?php

declare(strict_types=1);
namespace App\Domain\Errors\Controller;

class Error404
{

    public function __invoke()
    {
        return "Erreur 404 ! la page n'existe pas !";
    }
}