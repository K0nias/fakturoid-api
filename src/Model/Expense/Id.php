<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Expense;

final class Id
{

    /** @var int */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

}
