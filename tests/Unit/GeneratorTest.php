<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Generator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{

    /**
     * @dataProvider getRandomWordsDataProvider
     * @param        int  $words
     * @param        int  $length
     * @param        bool $exceptException
     */
    public function testGetRandomWords(int $words, int $length, bool $exceptException = false)
    {
        $generator = new Generator();
        if ($exceptException) {
            $this->expectException(InvalidArgumentException::class);
        }
        $results = $generator->getRandomWords($words, $length);
        $this->assertCount($words, $results);
        foreach ($results as $result) {
            $this->assertIsString($result);
            $this->assertEquals($length, strlen($result));
        }
    }

    /**
     * @return array
     */
    public function getRandomWordsDataProvider()
    {
        return [
            [1, 6],
            [2, 8],
            [3, 6],
            [5, 10],
            [0, 1, true],
            [10, 1, true],
            [0, 11, true],
        ];
    }
}
