<?php

function checkValue($value,$oldVal){
        switch($value){
            case '=':
                $display = calculate($oldVal);
                break;
            case 'C':
                header('Location: /calculator/index.php ');
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
    
    function calculate($exp){
          if(preg_match('/(?:\d+(?:(\.|)\d*)?\D)*\d*(?:(\.|)\d+)/', $exp, $matches) !== FALSE){
              $cf_DoCalc = create_function("", "return (" . $matches[0] . ");" );
              $res = $cf_DoCalc();
              return $res;    
          }
        /*if(preg_match('/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/', $exp, $matches) !== FALSE){
            $operator = $matches[2];
            echo '<pre>'; print_r($matches); exit;
            switch($operator){
                case '+':
                    $res = $matches[1] + $matches[3];
                    break;
                case '-':
                    $res = $matches[1] - $matches[3];
                    break;
                case '*':
                    $res = $matches[1] * $matches[3];
                    break;
                case '/':
                    $res = $matches[1] / $matches[3];
                    break;
            }

            return $res;
        }else{
            return 'arithmetic error';
        }*/
    }
?>