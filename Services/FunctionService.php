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
    public static function calculateFunction ($functionValues, $x) {
        
        $incrementalValue = 0;
        
        for ($i = (count($functionValues) - 1); $i > -1; $i--) {
            
            if ($i == 0) {
                $incrementalValue += $functionValues[i];
                break;
            }
            
            $incrementalValue +=  $functionValues[i] * pow($x, $i);
            
        }
        
        return $incrementalValue;
    }
    
    public static function formatValues ($function) {
        
        $functionValues = [];
        
        return $functionValues;
    }
    
}
