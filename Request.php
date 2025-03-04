<?php

namespace Nano\Http;

use Nano\Http\Interfaces\ParamHandler\CookieHandlerInterface;
use Nano\Http\Interfaces\ParamHandler\FileHandlerInterface;
use Nano\Http\Interfaces\ParamHandler\FormHandlerInterface;
use Nano\Http\Interfaces\ParamHandler\QueryHandlerInterface;
use Nano\Http\Interfaces\ParamHandler\ServerHandlerInterface;
use Nano\Http\Interfaces\ParamHandler\SessionHandlerInterface;
use Nano\Http\Param\QueryParam;
use Nano\Http\Param\FormParam;
use Nano\Http\Param\ServerParam;
use Nano\Http\Param\CookieParam;
use Nano\Http\Param\FileParam;
use Nano\Http\Param\SessionParam;

class Request
{
    public function __construct(
        private QueryParam   $queryParam,
        private FormParam    $formParam,
        private ServerParam  $serverParam,
        private CookieParam  $cookieParam,
        private FileParam    $fileParam,
        private SessionParam $sessionParam
    ) {
    }

    public function getQuery(): QueryHandlerInterface
    {
        return $this->queryParam->getHandler();
    }

    public function getForm(): FormHandlerInterface
    {
        return $this->formParam->getHandler();
    }

    public function getServer(): ServerHandlerInterface
    {
        return $this->serverParam->getHandler();
    }

    public function getCookie(): CookieHandlerInterface
    {
        return $this->cookieParam->getHandler();
    }

    public function getFile(?string $fileName = null): FileHandlerInterface
    {
        return $this->fileParam->getHandler($fileName);
    }

    public function getSession(?string $fileName = null): SessionHandlerInterface
    {
        return $this->sessionParam->getHandler($fileName);
    }

    public static function initialize(): self
    {
        return new self(
            queryParam:  new QueryParam($_GET ?? []),
            formParam:   new FormParam($_POST ?? []),
            serverParam: new ServerParam($_SERVER ?? []),
            cookieParam: new CookieParam($_COOKIE ?? []),
            fileParam:   new FileParam($_FILES ?? []),
            sessionParam: new SessionParam($_SESSION ?? [])
        );
    }

    public function __destruct()
    {
    }
}
