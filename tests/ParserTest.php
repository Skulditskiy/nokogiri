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

    /**
     * @test
     */
    public function loadHtml_readingElementWithAttributesToXml_test()
    {
        // prepare
        $classUnderTest = new Parser();
        $expectedResult = '<?xml version="1.0" encoding="UTF-8"?>
<root><b class="some-class">hello world</b></root>
';

        // test
        $classUnderTest->loadHtml('<div><a>' . $expectedResult . '</a><b class="some-class">hello world</b></div>');
        $result = $classUnderTest->get('div > b')->toXml();

        // verify
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @test
     */
    public function loadHtml_readingOfAttributeOfElement_test()
    {
        // prepare
        $classUnderTest = new Parser();
        $expectedResult = 'some-class-name and-other-name';

        // test
        $classUnderTest->loadHtml('<div><a>any content</a><b class="' . $expectedResult . '">hello world</b></div>');
        $result = $classUnderTest->get('div > b')->toArray()[0]['class'];

        // verify
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @test
     */
    public function toTextArray_basicHtml_test()
    {
        // prepare
        $classUnderTest = new Parser();

        // test
        $classUnderTest->loadHtml('<div><a>any content</a><b class="anything">hello world</b><b>another element</b></div>');
        $result = $classUnderTest->get('div > b')->toTextArray();

        // verify
        $this->assertCount(2, $result);
        $this->assertEquals('hello world', $result[0]);
        $this->assertEquals('another element', $result[1]);
    }

}
