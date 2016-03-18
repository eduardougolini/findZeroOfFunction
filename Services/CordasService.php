<?php

use FunctionService;

/**
 * Description of CordasService
 *
 * @author eduardo
 */
class CordasService {
    public static function calculate($function, $inferiorLimit, $superiorLimit) {
        
        
        
    }
    
    private static function calculateXn($function, $inferiorLimit, $superiorLimit) {
        
        $functionValues = FunctionService::formatValues($function);
        
        $fa = FunctionService::calculateFunction($functionValues, $inferiorLimit);
        $fb = FunctionService::calculateFunction($functionValues, $superiorLimit);
        
        return $inferiorLimit - ($fa / ($fb - $fa)) * ($superiorLimit - $inferiorLimit);
    }
}
