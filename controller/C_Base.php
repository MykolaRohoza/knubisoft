<?php

abstract class C_Base extends C_Controller {

    protected $needLogin; // необходимость авторизации 
    protected $controllerPath;
    protected $content;


    protected $needTimeTest;


    private $start_time; // время начала генерации страницы






    //
    // Конструктор.
    //
    function __construct() {
        parent::__construct();
        
        $this->needStocks = true;
        $this->needLoginForm = true;
        $this->needCarosel = true;
        

    }

    //
    // Виртуальный обработчик запроса.
    //
    protected function OnInput() {
       
        parent::OnInput();
        if($this->IsPost()){

            if ($_POST['regestration']) {
                $this->registration();
            }

        }
        else{
            if ($this->needTimeTest) {
                $this->start_time = microtime(true);
            }


            
        }
    }
    



    

            

        //
    // Виртуальный генератор HTML.
    //	
    protected function OnOutput() {

        
        $vars = array('container' => $this->content);
        $page = $this->View('view/view_base.php', $vars);

        if ($this->needTimeTest) {
            $time = microtime(true) - $this->start_time;
            $page .= "<!-- Время генерации страницы: $time сек.-->";
        }
        // Вывод HTML.
        echo $page;
 
        
    }

}
