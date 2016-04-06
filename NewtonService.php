<?php

/**
 * Description of NewtonService
 *
 * @author eduardo
 */
class NewtonService extends FunctionService {
    
     public static function calculate($function, $inferiorLimit, $error) {
        
        $fx = PHP_INT_MAX;
        $xn = $inferiorLimit;
        $count = 0;
        
        $results = [];
        
        while ($fx > $error || $fx < -$error) {
            
            $fx = self::calculateFunction($function, $xn);
            $derivativeOfFx = self::calculateDerivativeFunction($function, $xn);
            
            
            $results[$count] = "<tr><td>$count</td><td>$xn</td><td>$fx</td><td>$derivativeOfFx</td></tr>";
                       
            $xn = self::calculateXn($xn, $fx, $derivativeOfFx);
           
            $count++;
        }
        
        $returnString = '';
        foreach ($results as $result) {
            $returnString = $returnString . $result;
        }
        
        
        echo $returnString;
    }
    
    private static function calculateXn($xn, $fx, $derivativeOfFx) {
        return $xn - ($fx / $derivativeOfFx);
    }
    
}
