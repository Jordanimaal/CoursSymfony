<?php

declare(strict_types=1);
namespace App\Domain\Errors\Controller;
use App\Infra\Http\Response;
class Error404
{
    public function __invoke()
    {
        return new response ("Erreur 404 ! la page n'existe pas !");
    }
}