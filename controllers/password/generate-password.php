<?php
    class GenerarPassword {
        public $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$%&()*+-/<=>?@[\\]^_{}~";
        public $password = "";

        public function generar(){
            for ($i=0; $i <= 8 ; $i++) { 
                $this -> password .= substr($this->caracteres, rand(0,strlen($this->caracteres)), 1);
            }

            return $this->password;
        }
    }

    $passwordAleatorio = new GenerarPassword();

    $password = $passwordAleatorio -> generar();

    echo $password;
?>