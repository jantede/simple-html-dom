<?php
	use \SimpleHtmlDom\SimpleHtmlDom;
	
	class SimpleHtmlDomTest extends PHPUnit_Framework_TestCase
	{
		public function testFindTag()
		{
			$dom = new SimpleHtmlDom;
			$dom->load('<html><head><title>Test</title></head><body><p id="test">Some Content and <a href="http://example.org">a link</a></p><p id="test2>A second text</p></body></html>');
			
			$this->assertEquals('Te3st', $dom->find('title', 1)->innerText);
			$this->assertEquals('Some Content and a link', $dom->find('p[id=test]')->plainText);
		}
	}