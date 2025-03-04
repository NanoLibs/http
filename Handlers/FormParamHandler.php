<?php

namespace Nano\Http\Handlers;

use Nano\Http\Interfaces\ParamHandler\FormHandlerInterface;
use Nano\Http\Param\FormParam;
use Nano\Http\Traits\ParamSanitizationTrait;

class FormParamHandler extends BaseHandler implements FormHandlerInterface
{
    use ParamSanitizationTrait;
    public function getAll(): array
    {
        return $this->paramInterface->getAll();
    }
}