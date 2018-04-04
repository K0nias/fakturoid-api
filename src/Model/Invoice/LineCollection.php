<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Invoice;

final class LineCollection
{
    /**
     * @var Line[]
     */
    private $lines = [];

    /**
     * @param array $lines
     */
    public function __construct(array $lines = [])
    {
        array_map(function (Line $line) {
            $this->add($line);
        }, $lines);
    }


    /**
     * @param Line $line
     */
    protected function add(Line $line)
    {
        $this->lines[] = $line;
    }

    /**
     * @return Line[]
     */
    public function getAll(): array
    {
        return $this->lines;
    }
}