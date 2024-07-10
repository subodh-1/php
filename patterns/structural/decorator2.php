<?php
/*  Decorator Pattern
 Problem: Add responsibilities to an object dynamically.
 When to Use: To add behavior to objects without changing their code or subclasses.
 Example: Extending functionality of a basic UI component like adding scrollbars or borders.

 Decorator Pattern
 The Decorator Pattern allows behavior to be added to individual objects, dynamically, without affecting the behavior of other objects from the same class.

 Real-World Use Case: Extending UI Components
 Scenario: Adding features like borders, scrollbars, or shadows to UI components (e.g., text boxes or panels) in a GUI application. The Decorator pattern allows these additional features to be added dynamically without altering the base component class.
 Example: consider a basic UI component, a TextBox, and then add features like borders, scrollbars, and shadows using the Decorator pattern.
 */

 interface UIComponent {
    public function render();
 }

 class FormComponent implements UIComponent {
    private $ui;
    public function __construct($ui) {
        $this->ui = $ui;
    }
    public function render() {
        return $this->ui;
    }
 }

 abstract class FormComponentDecorator implements UIComponent {
    private $component;
    public function __construct(UIComponent $component) {
        $this->component = $component;
    }   
    public function render() {
        return $this->component->render();
    }
 }

 class BorderComponent extends FormComponentDecorator{
    public function render(){
        return $this->add_border();
    }
    public function add_border(){
        return "Border added -> ".parent::render();
    }
 }

 class ScrollbarComponent extends FormComponentDecorator {
    public function render() {
        return $this->add_scrollbar();
    }
    public function add_scrollbar() {
        return "Scrollbar added -> ". parent::render();
    }
 }

 //Client implementation
 $form = new FormComponent('Application Form');
 echo $form->render();
 echo PHP_EOL;
 $bordercomponent = new BorderComponent($form);
 echo $bordercomponent->render();
 echo PHP_EOL;
 $scrollbarcomponent = new ScrollbarComponent($bordercomponent);
 echo $scrollbarcomponent->render();



