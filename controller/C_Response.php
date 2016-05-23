<?php
class C_Response extends C_Controller{
    private $content;
    private $mCalc;
    
    function __construct() {
        parent::__construct();
        $this->mCalc = M_Calculate::Instance();

    }
   
    protected function OnInput() {
        parent::OnInput();
        if($this->IsPost()){
            if(isset($_POST['not'])){
                $query = $_POST['not'];
                $this->content =  $this->calculate($query);
            }
            
        }
        
       
    }
    
    private function calculate($query){
        $result = $this->mCalc->parse_and_calc($query);

        if(count($result) > 0){
            
            return json_encode($result);
        }
        else {
            return json_encode(array());
        }
    }




    
    protected function OnOutput() {
        parent::OnOutput();

        echo $this->content;
        
    }

}