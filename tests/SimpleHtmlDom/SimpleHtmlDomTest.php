<?php
	use \SimpleHtmlDom\SimpleHtmlDom;
	
	class SimpleHtmlDomTest extends PHPUnit_Framework_TestCase
	{
		public function testFindElement()
		{
			$dom = new SimpleHtmlDom;
			$dom->load('<html><head><title>Test</title></head><body><p id="test">Some Content and <a href="http://example.org">a link</a></p><p id="test2>A second text</p></body></html>');
			
			$this->assertEquals('Test', $dom->find('title', 1)->innerText);
			$this->assertEquals('Some Content and a link', $dom->find('p[id=test]')->plainText);
			$this->assertEquals('http://example.org', $dom->find('p[id=test] a')->href); 
		}
		
		public function testFindElementNested()
		{
			$dom = new SimpleHtmlDom;
			$dom->load('<html><head><title>Test</title></head><body><p id="test">Some Content and <a href="http://example.org">a link</a></p><p id="test2>A second text</p></body></html>');
			
			$this->assertEquals('http://example.org', $dom->find('p[id=test]', 0)->find('a')->href);
		}
	}