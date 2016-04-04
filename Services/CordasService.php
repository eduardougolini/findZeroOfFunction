<?php

use FunctionService;

/**
 * Description of CordasService
 *
 * @author eduardo
 */
class CordasService {
    public static function calculate($function, $inferiorLimit, $superiorLimit, $error) {
        
        $fx = PHP_INT_MAX;
        $a = $inferiorLimit;
        $b = $superiorLimit;
        $count = 0;
        
        $iterationsArray = [];
        
        while ($fx > $error) {
            $functionValues = FunctionService::formatValues($function);
            
            $xn = self::calculateXn($functionValues, $a, $b);
            $fx = FunctionService::calculateFunction($functionValues, $xn);
            
            $iterationsArray[$count] = [
                "A" => $a,
                "B" => $b,
                "xn" => $xn,
                "fx" => $fx
            ];
            
            if ($fx < 0) {
                $a = $xn;
            } else {
                $b = $xn;
            }
            
            $count++;
        }
        
        return json_encode($iterationsArray);
    }
    
    private static function calculateXn($functionValues, $inferiorLimit, $superiorLimit) {
                
        $fa = FunctionService::calculateFunction($functionValues, $inferiorLimit);
        $fb = FunctionService::calculateFunction($functionValues, $superiorLimit);
        
        return $inferiorLimit - ($fa / ($fb - $fa)) * ($superiorLimit - $inferiorLimit);
    }
}
