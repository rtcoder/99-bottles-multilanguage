<?php

namespace Bottles;

interface BottleTextInterface
{
    public function getPhrase(int $number): string;

    public function getLastPhrase(): string;
}
