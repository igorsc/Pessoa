<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author Igor
 */



include 'Enumerator.php';

class Pessoa extends Enumerator {
    //put your code here
        public  $Id;
        public $Nome;
        public $Data;
        public $Contato;
        public $TipoPessoa;
        
        public function __construct($Id,$Nome, $Data, $Contato, $TipoPessoa) {
           
            $this->Id=$Id;
            $this->Nome = $Nome;
            $this->Data = $Data;
            $this->Contato = $Contato;
            
          if ($TipoPessoa==0){
              $this->TipoPessoa= Enumerator::Selecione;
          }else if ($TipoPessoa ==1 ) {
                $this->TipoPessoa = Enumerator::Fisica;
                return $this->TipoPessoa;
          }else if ($TipoPessoa == 2) {
                $this->TipoPessoa =  Enumerator::Juridica;
          }   
            
           
        }
        
        
        
        
        
        
        public function getId() {
            return $this->Id;
        }

        public function getNome() {
            return $this->Nome;
        }

        public function getData() {
            return $this->Data;
        }

        public function getContato() {
            return $this->Contato;
        }

        public function getTipoPessoa() {
           return $this->TipoPessoa;
        }

        public function setId($Id) {
            $this->Id = $Id;
        }

        public function setNome($Nome) {
            $this->Nome = $Nome;
        }

        public function setData($Data) {
            $this->Data = $Data;
        }

        public function setContato($Contato) {
            $this->Contato = $Contato;
        }

        public function setTipoPessoa($TipoPessoa){ 
                
//          if ($TipoPessoa=="Selecione..."){
//              $this->TipoPessoa= 0;
//          }else if ($TipoPessoa == "Fisica") {
//                $this->TipoPessoa = 1;
//                return $this->TipoPessoa;
//          }else if ($TipoPessoa == "Juridica") {
//                $this->TipoPessoa = 2;
//          }   
            
//            $this->TipoPessoa=$TipoPessoa;
        
            
                    
          if ($TipoPessoa==0){
              $this->TipoPessoa= Enumerator::Selecione;
          }else if ($TipoPessoa == 1) {
                $this->TipoPessoa = Enumerator::Fisica;
                return $this->TipoPessoa;
          }else if ($TipoPessoa == 2) {
                $this->TipoPessoa =  Enumerator::Juridica;
          }   
           

        }

    

}
