<?php

/**
 * Description of PegasusService
 *
 * @author eduardo
 */
class PegasusService extends FunctionService {
    
    public static function calculate($function, $inferiorLimit, $superiorLimit, $error) {
        
        $fx = PHP_INT_MAX;
        $x = $superiorLimit;
        $fa = self::calculateFunction($function, $inferiorLimit);
        $fb = self::calculateFunction($function, $superiorLimit);
        $count = 0;
        
        $results = [];
        
        while ($fx > $error || $fx < -$error) {

            $delta = $fb / ($fb - $fa) * ($superiorLimit - $inferiorLimit);
            $x -= $delta;

            $fx = self::calculateFunction($function, $x);

            $results[$count] = "<tr><td>$count</td><td>$inferiorLimit</td><td>$fa</td><td>$superiorLimit</td>"
                    . "><td>$fb</td>><td>$delta</td>><td>$x</td>><td>$fx</td></tr>";
            
            if ($fx * $fb < 0) {
                $inferiorLimit = $superiorLimit;
                $fa = $fb;
            } else {
                $fa = ($fa * $fb) / ($fb + $fx);
            }

            $superiorLimit = $x;
            $fb = $fx;
            
            $count++;
            
            if ($count > 200) {
                break;
            }
            
        }
        
        $returnString = '';
        foreach ($results as $result) {
            $returnString = $returnString . $result;
        }
        
        
        echo $returnString;
    }
}
