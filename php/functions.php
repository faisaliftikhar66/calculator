<?php
/**
* function checkValue
* @param $value and $oldVal
* This function check value and operators that if val is numeric then append with previous and make a expression also. If operator is equal sign then
* it check again value is numeric then reset otherwise append and generate expression.
* @return display 
*/
function checkValue($value,$oldVal){
        switch($value){
            case '=':
                $display = calculate($oldVal);
                break;
            case 'C':
                header('Location: /faisal/calculator/index.php ');
                break;
            default:
                if(isset($oldVal) && $oldVal !=0){
                    if($_GET['opr'] == ' =' && is_numeric($value)){
                        $oldVal = $value;    
                    }else{
                    $oldVal .= $value;
                    }
                }else{
                    $oldVal = $value;
                }
                $display = $oldVal;
                break;
        }
        return $display;
}
/**
* function calculate
* @param expression
* This function calculate the result of arithmethic expression with create_function technique. Firstly it check/matches the expression
* which is exactly right for calculation or not.
* @return result;
*/
    function calculate($exp){
          if(preg_match('/(?:\d+(?:(\.|)\d*)?\D)*\d*(?:(\.|)\d+)/', $exp, $matches) !== FALSE){
              $cf_DoCalc = create_function("", "return (" . $matches[0] . ");" );
              $res = $cf_DoCalc();
              return $res;    
          }
    }
?>