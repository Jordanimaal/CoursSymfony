<?php
declare(strict_types=1);
namespace App\Infra\EventDispatcher\Events;

class RequestEvent
{
    public function __construct(private $request) {

    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     */
    public function setRequest($request): void
    {
        $this->request = $request;
    }


}