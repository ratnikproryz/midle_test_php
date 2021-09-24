<?php 
    class Validate{
        private $fields;
        public function __construct()
        {
            $this->fields = new Fields();
        }
        public function getFields(){ return $this->fields; }
        
        public function text($name, $value, $required = true, $min=1, $max= 255){
            $field= $this->fields->getField($name);
            
            if(!$required && empty($value)){
                $field->clearErrorMessage();
                return;
            }

            if($required && empty($value)){
                $field->setErrorMessage('Required.');
            }else if(strlen($value) <$min){
                $field->setErrorMessage($field->getName().' is too short.');
            }else if(strlen($value) > $max){
                $field->setErrorMessage($field->getName(). 'is too long.');
            }else{
                $field->clearErrorMessage();
            }
        }

        public function pattern($name, $value, $pattern, $message, $required=true){
            $field= $this->fields->getField($name);
            if(!$required && empty($value)){
                $field->clearErrorMessage();
                return;
            }
            $match= preg_match($pattern, $value);
            if($match ===false){
                $field->setErrorMessage('Error testing field.');
            }else if($match !=1){
                $field->setErrorMessage($message);
            }else{
                $field->clearErrorMessage();
            }
        }

        public function phone($name, $value, $required=true){
            $field= $this->fields->getField($name);
            $this->text($name, $value, $required);

            if($field->hasError()){
                return;
            }
                $pattern ='/^0[[:digit:]]{9}$/';
            $message="Invalid phone number.";
            $this->pattern($name, $value, $pattern, $message, $required);
        }

        public function email($name, $value, $required=true){
            $field= $this->fields->getField($name);

            if(!$required && empty($value)){
                $field->clearErrorMessage();
                return ;
            }
            $this->text($name, $value, $required);
            if($field->hasError()){
                return ;
            }
            
            $parts= explode('@', $value);
            if(count($parts) < 2){
                $field->setErrorMessage('At sign required.');
                return;
            }
            if(count($parts) > 2){
                $field->setErrorMessage('Only one at sign allowed.');
                return;
            }
        }

    }
?>