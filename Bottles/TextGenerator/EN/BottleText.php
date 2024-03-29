<?php

namespace Bottles\TextGenerator\EN;

use Bottles\BottleTextInterface;
use Bottles\TextGenerator\PhraseTrait;

class BottleText implements BottleTextInterface
{
    use PhraseTrait;

    private string $singularBottle = 'bottle';
    private string $pluralBottle = 'bottles';
    private string $noBottle = 'no more';

    public function getPhrase(int $number): string
    {

        $firstPhrase = $this->getFirstPhrase($number);

        return $firstPhrase . ', ' . $firstPhrase . '. '
            . $this->getSecondPhrase($number)
            . PHP_EOL;
    }

    public function getLastPhrase(): string
    {
        return "No more bottles of beer on the wall, no more bottles of beer." . PHP_EOL
            . "Go to the store and buy some more, 99 bottles of beer on the wall." . PHP_EOL;
    }

    private function getFirstPhrase(int $number): string
    {
        return $this->getDynamicLastBottlesWord($number) . ' beer '
            . $this->getDynamicBottlesWord($number) . ' on the wall';
    }

    private function getSecondPhrase(int $number): string
    {
        return 'Take one down and pass it around - ' . $this->getFirstPhrase($number - 1);
    }

    public function getDynamicBottlesWord(int $number): string
    {
        if ($this->isSingular($number)) {
            return $this->singularBottle;
        }

        return $this->pluralBottle;
    }

}
