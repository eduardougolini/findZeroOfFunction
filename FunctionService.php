<?php

/**
 * Description of FunctionService
 *
 * @author eduardo
 */
class FunctionService {
    
    /**
     * Calcula o valor da função de X
     * @param type $function
     * @param type $x
     * @return type
     */
    public static function calculateFunction ($function, $x) {
               
        $function = self::formatValues($function, $x);
        
        return eval("return " . $function);
    }
    
    /**
     * Calcula a derivada da função de X
     * @param type $function
     * @param type $x
     * @return type
     */
    public static function calculateDerivativeFunction ($function, $x) {
        $function = self::formatDerivativeValues($function, $x);
        
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
    
    private static function formatDerivativeValues ($function, $x) {
        
        $garbage = substr(strrchr($function, "x"), 0);
        $function = str_replace($garbage, ";", $function);
        
        for($i = 0; $i < 20; $i++) {
            for($j = 0; $j < 100; $j++) {
                $potentialValue = $i - 1;
                        
                $function = str_replace("x^$i", "$i * pow($x, $potentialValue)", $function);
                $function = str_replace("$j$i ", "$j * $i ", $function);
            }
        }
        
        return $function;
    }
    
}
