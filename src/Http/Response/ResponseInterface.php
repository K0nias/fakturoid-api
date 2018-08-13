<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Response;

interface ResponseInterface
{

    public function hasError(): bool;

    public function getErrors(): array;

}
