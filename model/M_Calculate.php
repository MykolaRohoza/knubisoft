<?php

class M_Calculate
{
    private static $instance; 	
					




    //
    // Получение единственного экземпляра (одиночка)
    //
    public static function Instance()
    {
        if (self::$instance == null) {
            self::$instance = new M_Calculate();
        }

        return self::$instance;
    }

    //
    // Конструктор
    //
    private function __construct()
    {
    }
    public function parse_and_calc($query){
        $tmp  = explode(' ', $query);
        $result;
        $num = array();
        $stack = array();

        for($j = 0; $j < count($tmp); $j++){
            if(is_numeric($tmp[$j])) {
                $num[] = (float)$tmp[$j];  
            }
            else{
                $stack[] = $tmp[$j];
            }
        }
        
        for($i = 1; $i < count($num); $i++){
            $num[$i] = $this->calc($num[$i - 1], $num[$i], $stack[$i - 1]);
        }
        //$result = implode(',', $num);
        return $num[count($num) - 1];
    }
    private function calc($var1, $var2, $method){
        switch ($method){
            case '`':
                $result = $var1 + $var2;
                break;
            case '-':
                $result = $var1 - $var2;
                break;
            case '/':
                $result = $var1 / $var2;
                break;
            case '*':
                $result = $var1 * $var2;
                break;
            case '^':
                $result = pow($var1, $var2);
                break;
        }
        return $result;
    }
    
}
