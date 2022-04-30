<?php

namespace Src\Solid\Srp;

interface TemplatingEngineInterface
{
    public function render(string $template, array $params): string;
}
