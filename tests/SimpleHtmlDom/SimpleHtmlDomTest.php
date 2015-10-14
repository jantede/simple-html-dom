<?php
	use \SimpleHtmlDom\SimpleHtmlDom;
	
	class SimpleHtmlDomTest extends PHPUnit_Framework_TestCase
	{
		public function testFindElement()
		{
			$dom = new SimpleHtmlDom;
			$dom->load('<html><head><title>Test</title></head><body><p id="test">Some Content and <a href="http://example.org">a link</a></p><p id="test2>A second text</p></body></html>');
			
			$this->assertEquals('Test', $dom->find('title', 0)->innertext);
			$this->assertEquals('Some Content and a link', $dom->find('p[id=test]', 0)->plaintext);
			$this->assertEquals('http://example.org', $dom->find('p[id=test] a', 0)->href); 
		}
		
		public function testFindElementNested()
		{
			$dom = new SimpleHtmlDom;
			$dom->load('<html><head><title>Test</title></head><body><p id="test">Some Content and <a href="http://example.org">a link</a></p><p id="test2>A second text</p></body></html>');
			
			$this->assertEquals('http://example.org', $dom->find('p[id=test]', 0)->find('a', 0)->href);
		}
		
		public function testGetImageSource()
		{
			$dom = new SimpleHtmlDom;
			$dom->load('<html><head><title>Test</title></head><body><img src="http://example.org"></img></body></html>');
			
			$this->assertEquals('http://example.org', $dom->find('img', 0)->src);
		}
	}