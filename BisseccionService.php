<?php

/**
 * Description of BisseccionService
 *
 * @author eduardo
 */
class BisseccionService extends FunctionService {
    
    public static function calculate($function, $inferiorLimit, $superiorLimit, $error) {
        
        $fx = PHP_INT_MAX;
        $a = $inferiorLimit;
        $b = $superiorLimit;
        $count = 0;
        
        $results = [];
        
        while ($fx > $error || $fx < -$error) {
            
            $xn = self::calculateXn($a, $b);
            $fx = self::calculateFunction($function, $xn);
            
            $results[$count] = "<tr><td>$count</td><td>$a</td><td>$b</td><td>$xn</td><td>$fx</td></tr>";
            
            if ($fx < 0) {
                $a = $xn;
            } else {
                $b = $xn;
            }
            
            $count++;
        }
        
        $returnString = '';
        foreach ($results as $json) {
            $returnString = $returnString . $json;
        }
        
        
        echo $returnString;
    }
    
    private static function calculateXn($inferiorLimit, $superiorLimit) {
        return ($inferiorLimit + $superiorLimit) / 2;
    }
}
