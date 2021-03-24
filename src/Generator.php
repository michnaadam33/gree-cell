<?php

declare(strict_types=1);

namespace App;

use Webmozart\Assert\Assert;

class Generator
{
    /**
     * @see    https://gist.github.com/sepehr/3371339
     * @param  int $words
     * @param  int $length
     * @return string[]
     */
    public function getRandomWords(int $words = 1, int $length = 6): array
    {
        Assert::greaterThan($words, 0);
        Assert::greaterThan($length, 2);

        $ret = [];
        for ($o = 1; $o <= $words; $o++) {
            $vowels = ["a", "e", "i", "o", "u"];
            $consonants = [
                'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm',
                'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'
            ];

            $word = '';
            for ($i = 1; $i <= $length; $i++) {
                $word .= $consonants[rand(0, 19)];
                $word .= $vowels[rand(0, 4)];
            }
            $ret[] = mb_substr($word, 0, $length);
        }
        return $ret;
    }
}
