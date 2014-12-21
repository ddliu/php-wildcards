<?php
namespace ddliu\wildcards;

class Wildcards {
    protected $regexp;
    const DELIMITER = '/';
    public function __construct($pattern) {

        // abc\*def* => abc\\\*def\* => /^abc\*def.*$/
        $pattern = preg_quote($pattern, self::DELIMITER);
        $pattern = preg_replace_callback('/([\\\\]{1,3})\*/', function($matches) {
            $length = strlen($matches[1]);
            if ($length === 1) {
                return '.*';
            }

            return '\*';
        }, $pattern);

        $this->regexp = self::DELIMITER.'^'.$pattern.'$'.self::DELIMITER;
    }

    public function match($string) {
        return (bool)preg_match($this->regexp, $string);
    }
}