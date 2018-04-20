<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Line;

use K0nias\FakturoidApi\Exception\InvalidParameterException;

final class LineCollection
{
    /**
     * @var Line[]
     */
    private $lines = [];

    /**
     * @throws InvalidParameterException if lines[] is empty
     *
     * @param array $lines
     */
    public function __construct(array $lines = [])
    {
        if (0 === count($lines)) {
            throw new InvalidParameterException("There must be at least one line in LineCollection. Empty array given.");
        }

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