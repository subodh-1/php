<?php 
/**
 * Prototype Pattern:
 * Creates new objects by copying an existing object, known as the prototype.
 * Prototype Pattern
 * Problem: Create new objects by copying an existing object.
 * When to Use: When the cost of creating an object is expensive or complex.
 * Example: Cloning objects like user sessions or system resources.
 * 
 * Real-Life Example: Cloning a User Profile
    * Let's consider a real-life scenario where we manage user profiles in a web application. 
    * Creating a new user profile with default settings and configurations might be complex and time-consuming. 
    * Instead, we can create a prototype user profile and clone it whenever we need a new profile.
*/
interface Prototype {
    public function __clone();
}

class UserProfile implements Prototype {
    private $name;
    private $email;
    private $settings;

    public function __construct($name, $email, $settings){
        $this->name = $name;
        $this->email = $email;
        $this->settings = $settings;
    }
    public function __clone(){
        return new UserProfile($this->name, $this->email, $this->settings);
    }
    public function set_name($name) {
        $this->name = $name;
    }
    public function get_name(){
        return $this->name;
    }
    public function get_email(){
        return $this->email;
    }
    public function get_settings(){
        return $this->settings;
    }

}

$name = 'Subodh';
$email = 'test@test.com';
$settings = array('active'=>1);
$profile = new UserProfile($name, $email, $settings);
echo $profile->get_name();
$newprofile = clone $profile;
$newprofile->set_name('XYZ');
echo $newprofile->get_name();
