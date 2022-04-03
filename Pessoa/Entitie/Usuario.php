<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario{
    public $Id;
    public $Login;
    public $Senha;
    
    public function __construct($Id,$Login,$Senha){
        $this->Id=$Id;
        $this->Login=$Login;
        $this->Senha=$Senha;
    }
    
}

