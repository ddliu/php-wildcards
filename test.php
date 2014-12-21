<?php
require __DIR__.'/src/Wildcards.php';
use ddliu\wildcards\Wildcards;

class allTest extends PHPUnit_Framework_TestCase {
    protected $tests = [
        ['test prefix', 'http://google.com/search', 'http://google.*', true],
        ['test prefix: should fail', 'http://google.com/search', 'google.*', false],
        ['test surfix', 'http://google.com/search', '*/search', true],
        ['test surfix: should fail', 'http://google.com/search', '*.com', false],
        ['test middle', 'http://google.com/search', '*google*', true],
        ['test special char', 'three * seven = twenty one?', '*three \* seven*', true],
    ];

    public function testAll() {
        foreach ($this->tests as $test) {
            list($message, $input, $wildcards, $result) = $test;
            $w = new Wildcards($wildcards);
            $this->assertEquals($result, $w->match($input), $message);
        }
    }
}