<?php

include './FunctionService.php';

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
                
        $jsonResults = [];
        
        while ($fx > $error || $fx < -$error) {
            
            $xn = self::calculateXn($function, $a, $b);
            $fx = FunctionService::calculateFunction($function, $xn);
            
            $jsonResults[$count] = "<tr><td>$count</td><td>$a</td><td>$b</td><td>$xn</td><td>$fx</td></tr>";
            
            if ($fx < 0) {
                $a = $xn;
            } else {
                $b = $xn;
            }
            
            $count++;
        }
        
        $returnString = '';
        foreach ($jsonResults as $json) {
            $returnString = $returnString . $json;
        }
        
        
        echo $returnString;
    }
    
    private static function calculateXn($function, $inferiorLimit, $superiorLimit) {
                
        $fa = FunctionService::calculateFunction($function, $inferiorLimit);
        $fb = FunctionService::calculateFunction($function, $superiorLimit);
        
        return $inferiorLimit - ($fa / ($fb - $fa)) * ($superiorLimit - $inferiorLimit);
    }
}
