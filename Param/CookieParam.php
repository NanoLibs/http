<?php

namespace NanoLibs\Http\Param;

use NanoLibs\Http\Handlers\CookieParamHandler;
use NanoLibs\Http\Interfaces\ParamHandler\CookieHandlerInterface;
use NanoLibs\Http\Interfaces\ParamInterface;
use NanoLibs\Http\Traits\ParamGetterTrait;

class CookieParam extends BaseParameter implements ParamInterface
{
    use ParamGetterTrait;

    public function getHandler(): CookieHandlerInterface
    {
        return $this->handler ??= new CookieParamHandler($this);
    }
}
