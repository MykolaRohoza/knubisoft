<?php header('Content-type: text/html; charset=utf-8');?>
<?php 
    function __autoload($className){
            $dir = explode('_', $className);
            $dirPath = __DIR__ . '/';
            switch($dir[0]){
                    case'C': 
                        $dirPath .= "controller/";
                        break;
                    case 'M': 
                        $dirPath .= "model/";
                        break;
            }
             include_once($dirPath . $className . ".php");
    }
    
    switch ($_GET["C"])	{
        case 'resp':
            $controller = new C_Response();
            break;
        default : $controller = new C_Main();
    }

	$controller->Request();


