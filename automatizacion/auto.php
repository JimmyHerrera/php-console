<?php
    namespace automatizacion;

    class Auto {
        public $modelo;
        public $puertas;
        public $ruedas;

        function __construct($modelo,$puertas,$ruedas)
        {
            $this->modelo = $modelo;
            $this->puertas = $puertas;
            $this->ruedas = $ruedas;
        }

        function getAuto(){
            return "El modelo es ".$this->modelo. " y tiene ". $this->puertas." puertas y ".$this->ruedas." ruedas. <br>";
        }
        
    }
?>