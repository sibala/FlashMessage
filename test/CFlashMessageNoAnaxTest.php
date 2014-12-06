<?php

namespace Sial;

/**
 * A class for prompting flash messages
 * 
 * @package CFlashMessage
 */

class CFlashMessagNoAnaxTest extends \PHPUnit_Framework_TestCase
{
	private $msg;
	
    public function setUp() {
        $this->msg = new \Sial\CFlashMessageNoAnax();
    }

	public function testGetMessage() 
    {
		$flashes = [
			"success"  => "yes!, everything went very smoothly",
			"notice"  => "this a very important information",
			"warning" => "best check yo self, you're not looking too good.",
			"error"   => "too bad! the form had errors"
		];
		foreach($flashes as $flashName => $flashMsg){
			$this->msg->setMessage($flashName);
			
			$res = $this->msg->getMessage();
			$exp = "<div id=\"{$flashName}\">{$flashMsg}</div>";
			$this->assertEquals($res, $exp, "Created element name missmatch.");
		}
		
    }
	public function testGetMessageCustomed() 
    {
        $this->msg->setMessage('notice', "Testing");
        
		$res = $this->msg->getMessage();
		$exp = "<div id=\"notice\">Testing</div>";
        $this->assertEquals($res, $exp, "Created element name missmatch.");
    }

}