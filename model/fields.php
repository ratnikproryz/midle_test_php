<?php
    class Field{
        private $name;
        private $message='';
        private $hasError = false;

        function __construct($name, $message=''){
            $this->name = $name;
            $this->message = $message;
        }
        
        public function getName() { return $this->name; }
        public function getMessage() { return $this->message; }
        public function hasError() { return $this->hasError;}

        public function setErrorMessage($message) {
            $this->message = $message;
            $this->hasError = true;
        }
        public function clearErrorMessage() {
            $this->message = '';
            $this->hasError = false;
        }
        
        public function getHTML(){ 
            $message = htmlspecialchars($this->message);
            if($this->hasError){
                return '<span class="error">'.$message.'</span>';
            }else{
                return '<span>'.$message.'</span>';
            }
        }
    }

    class Fields{
        private $fields= array(); // khai bao mang cac field
        public function addField($name, $message=''){
            $filed = new Field($name, $message);
            $this->fields[$filed->getName()] = $filed;
        }

        public function getField($name){
            return $this->fields[$name];
        }
        public function hasError(){
            foreach($this->fields as $field){
                if($field->hasError()) return true;
            }
            return false;
        }
    }
    
?>