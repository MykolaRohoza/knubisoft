<?php
//
// Конттроллер страницы-примера.
//
class C_Main extends C_Base {
    
    // переменные для создания наполнения 


    protected $contVars;




    //
    // Конструктор.
    //
    function __construct() 
    {
    	parent::__construct();
  
        $this->needLogin = false;
    	$this->needTimeTest = true;
       

    }


    
    //
    // Виртуальный обработчик запроса.
    //
    protected function OnInput(){
        
        parent::OnInput();

        
        // Обработка отправки формы.
        if ($this->IsPost()) {

        }
        else
        {	


            
           
        }
                
        
    }
    //
    // Виртуальный генератор HTML.
    //
    public function OnOutput() {   	

        //Генерация вложенных шаблонов

        
        $this->content = $this->View('view/view_main.php', $this->content);
        parent::OnOutput();
        
        
            
    }
            
            
          
 }
