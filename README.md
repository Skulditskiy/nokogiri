PHP parser of invalid HTML
===========
This library is quick parser of HTML code and it can work with invalid markup.

Ofter problem with parsing websites with PHP is that simplexml_load_string and other methods can not work with even slightly corrupted HTML code.

Example usage
===================================
```php
<?php
$html = file_get_contents('https://whatever-domain.com/');

$saw = new Nokogiri\Parser();
$saw->loadHtml($html);
var_dump($saw->get('a.habracut')->toArray());
var_dump($saw->get('ul.panel-nav-top li.current')->toArray());
var_dump($saw->get('#sidebar dl.air-comment a.topic')->toArray());
var_dump($saw->get('a[rel=bookmark]')->toArray());

foreach ($saw->get('#sidebar a.topic') as $link){
    var_dump($link['#text']);
}
```

HTML errors will be ignored.<br>
Creating from HTML string: `\Nokogiri\Parser::fromHtml($htmlString)`<br>
Creating from DomDocument: `\Nokogiri\Parser::fromDom($dom)`<br>

Implemented CSS selectors
=========================
* tag
* .class
* \#id
* \[attr\]
* \[attr=value\]
* :first-child
* :last-child
* :nth-child(a)
* :nth-child(an+b)
* :nth-child(even/odd)

