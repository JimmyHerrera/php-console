<?php
    class Person{
        public $firstName;
        public $lastName;

        function __construct($firstName,$lastName)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
        }
        function greetings(){
            return "Hola ". $this->firstName." ".$this->lastName;
        }
    }


?>