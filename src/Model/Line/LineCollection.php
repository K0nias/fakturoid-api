<?php declare(strict_types = 1);

namespace K0nias\FakturoidApi\Model\Line;

final class LineCollection
{

    /** @var \K0nias\FakturoidApi\Model\Line\Line[] */
    private $lines = [];

    /**
     * @param \K0nias\FakturoidApi\Model\Line\Line[] $lines
     */
    public function __construct(array $lines = [])
    {
        if (count($lines) === 0) {
            throw new \K0nias\FakturoidApi\Exception\InvalidParameterException(
                'There must be at least one line in LineCollection. Empty array given.'
            );
        }

        array_map(function (Line $line): void {
            $this->add($line);
        }, $lines);
    }


    protected function add(Line $line): void
    {
        $this->lines[] = $line;
    }

    /**
     * @return \K0nias\FakturoidApi\Model\Line\Line[]
     */
    public function getAll(): array
    {
        return $this->lines;
    }

}
