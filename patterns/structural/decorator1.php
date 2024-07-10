<?php
/*  Decorator Pattern
 Problem: Add responsibilities to an object dynamically.
 When to Use: To add behavior to objects without changing their code or subclasses.
 Example: Extending functionality of a basic UI component like adding scrollbars or borders.

 Decorator Pattern
 The Decorator Pattern allows behavior to be added to individual objects, dynamically, without affecting the behavior of other objects from the same class.

 Example: Adding features to a simple text message 
 */

 interface TextMessage {
    public function get_text();
 }

 class SimpleTextMessage implements TextMessage {
    private $message;
    public function __construct($message) {
         $this->message = $message;
    }

    public function get_text() {
      return $this->message;
    }

 }

 abstract class TextMessageDecorator implements TextMessage {
   private $concrete_message;
   public function __construct(TextMessage $concrete_message) {
      $this->concrete_message = $concrete_message;
   }
   public function get_text(){
      return $this->concrete_message->get_text();
   }
 }

 class EncryptedTextMessage extends TextMessageDecorator {
   public function get_text() {
      return $this->encrypt();
   }
   public function encrypt() {
      return "Encrypted -> ". parent::get_text();
   }
 }

 class HtmlTextMessage extends TextMessageDecorator{
   public function get_text(){
      return $this->add_html();
   }
   public function add_html() {
      return "Html added -> ".parent::get_text();
   }
 }

 $text = new SimpleTextMessage("Hello Dear, how are you!!");
 echo $text->get_text();

 $encrypted = new EncryptedTextMessage($text);
 echo $encrypted->get_text();

 $htmladd = new HtmlTextMessage($encrypted);
 echo $htmladd->get_text();



