<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Http\Request;

use K0nias\FakturoidApi\Api;
use K0nias\FakturoidApi\Http\Method;

interface RequestInterface
{

    public function getUri(): string;

    public function getMethod(): Method;

    /**
     * @return mixed[]
     */
    public function getData(): array;

    // phpcs:disable SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingReturnTypeHint
    // every request implementation of RequestInterface has own return type

    /**
     * @return \K0nias\FakturoidApi\Http\Response\ResponseInterface
     */
    public function send(Api $api);

    // phpcs:enable

}
