<?php
use Eris\Generator;
use Eris\TestTrait;

class VectorTest extends PHPUnit_Framework_TestCase
{
    use TestTrait;

    public function testConcatenationMaintainsLength()
    {
        $this->forAll([
            Generator\vector(10, Generator\nat(1000)),
            Generator\vector(10, Generator\nat(1000)),
        ])
            ->__invoke(function($first, $second) {
                var_dump($first, $second);
                $concatenated = array_merge($first, $second);
                $this->assertEquals(
                    count($concatenated),
                    count($first) + count($second),
                    var_export($first, true) . " and " . var_export($second, true) . " do not maintain their length when concatenated."
                );
            });
    }
}