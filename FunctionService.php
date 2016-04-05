<?php

/**
 * Description of FunctionService
 *
 * @author eduardo
 */
class FunctionService {
    
    /**
     * Calcula o valor da função de X
     * @param type $functionValues
     * @param type $x
     * @return type
     */
    public static function calculateFunction ($function, $x) {
               
        $function = self::formatValues($function, $x);
        
        return eval("return " . $function);
    }
    
    private static function formatValues ($function, $x) {
        
        for($i = 0; $i < 20; $i++) {
            for($j = 0; $j < 100; $j++) {
                $function = str_replace("x^$i", "pow($x, $i)", $function);
                $function = str_replace($j . "pow", "$j * pow", $function);
                $function = str_replace($j . "x^$i", "$j * pow($x, $i)", $function);
                $function = str_replace($j . "x ", "$j * $x", $function);
            }
        }
        
        $function = $function . ";";
        
        return $function;
        
    }
    
}
