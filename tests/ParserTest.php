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

    /**
     * @test
     */
    public function loadHtml_readingContentOfBasicElement_test()
    {
        // prepare
        $classUnderTest = new Parser();
        $expectedResult = 'link';

        // test
        $classUnderTest->loadHtml('<div><a>' . $expectedResult . '</a><b>hello world</b></div>');
        $result = $classUnderTest->get('div a')->toArray()[0]['#text'][0];

        // verify
        $this->assertEquals($expectedResult, $result);
    }

}
