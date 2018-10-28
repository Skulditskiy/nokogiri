<?php

namespace Nokogiri;

use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /**
     * @test
     */
    public function construct_test()
    {
        // prepare
        $classUnderTest = new Parser();
        
        // test
        // verify
        $this->assertInstanceOf(Parser::class, $classUnderTest);
    }
}
