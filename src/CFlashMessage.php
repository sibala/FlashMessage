<?php

namespace Sial\FlashMessage;

/**
 * A class for prompting flash messages
 * 
 * @package CFlashMessage
 */

class CFlashMessage implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;
	
	
	/**
     * Properties
     */
	private $msgType = ['success', 'notice', 'warning', 'error']; // array that contains the 4 message alternatives
	
	/**
     * Gets all messages in html format
     *
     * @return all messages in html
     */
	public function getMessage()
	{
		$htmlMessages = null;
		foreach($this->findMessages() as $key => $msg){
			$htmlMessages .= "<div id=\"{$msg['msgType']}\">{$msg['msg']}</div>";		
		}
		$this->clearMessages();
		
		return $htmlMessages;
	}

	/**
     * Sets message
     *
     * @param array $msgType is message type
     * @param $msg is the message content
     */
	public function setMessage($msgType, $msg = null)
    {
		if(!in_array($msgType, $this->msgType)){
			die("Invalid message type. Please choose from the alternatives 'success', 'notice', 'warning' or 'error'.");
		}
		
		if(isset($msg)){														//custom message
			$this->addMessage($msgType, $msg);
			
		} elseif ($msgType == 'success'){										//default message
			$this->addMessage($msgType, "yes!, everything went very smoothly");
			
		} elseif ($msgType == 'notice'){
			$this->addMessage($msgType, "this a very important information");
			
		} elseif ($msgType == 'warning'){
			$this->addMessage($msgType, "best check yo self, you're not looking too good.");
			
		} elseif ($msgType == 'error'){
			$this->addMessage($msgType, "too bad! the form had errors");
		}
    }
	/**
     * stores message into session
     *
     * @param array $msgType is message type
     * @param $msg is the message content
     */
	private function addMessage($msgType, $msg)
    {
        $messages = $this->findMessages();
        $messages[] = [
				'msgType' => $msgType,
				'msg' => $msg
				];
        $this->session->set('FlashMsg', $messages);
    }
	
	/**
     * Finds all messages from a session
	 *
     * @return all messages
     */
	private function findMessages()
    {
        $messages = $this->session->get("FlashMsg", []);
		 if(!isset($messages))	
        {
            return null;
        } 
		return $messages;
    }
	
	/**
     * Clears session from all flash messages
     */
	private function clearMessages(){
		$this->session->set("FlashMsg", null);
	}
	
}
?>