<?php

namespace app\models;

use yii\base\Model;
use app\models\Ticket2;

class Helper extends Model
{
    
    public function dataParcer($data){
        $monthsArr = 
        [
            'Январь' => 1,
            'Февраль' => 2,
            'Март' => 3,
            'Апрель' => 4,
            'Май' => 5,
            'Июнь' => 6,
            'Июль' => 7,
            'Август' => 8,
            'Сентябрь' => 9,
            'Октябрь' => 10,
            'Ноябрь' => 11,
            'Декабрь' => 12,            
        ];
        
        $findDataArr = [];
        foreach($monthsArr as $key=>$value){
            if (preg_match("/$key/", $data)) {
                $month = $value;
                if (preg_match("/[\d]{4}/", $data, $matches)){
                    $findDataArr['dateFrom'] = $matches[0].'-'.'0'.$month.'-'.'01'.' '.'00:00:00';
                    if($month != 12){
                        $month = $month +1;
                    }else{
                        $month = 1;
                    }
                    $findDataArr['dateTo'] = $matches[0].'-'.'0'.$month.'-'.'01'.' '.'00:00:00';
                    return $findDataArr;
                }
            }            
        }
    }
    
    public static function countTransactions(){        
        $countTransactions = Ticket2::find()->select(['date'])->orderBy(['id'=>SORT_DESC])->asArray()->limit(99999999999999)->all();
    //     \Yii::info(print_r($countTransactions,1), 'logging');       
        
        $panelDataArr = [];
        foreach($countTransactions as $key=>$value){
            $year = substr($value['date'], 0, 4);
            $panelDataArr[$year][] = substr($value['date'], 5, 2);
            
        }
        krsort($panelDataArr);
        
        $newPanelDataArr = [];
        foreach($panelDataArr as $key=>$value){
            $jan = 0;
            $feb = 0;
            $mar = 0;
            $apr = 0;
            $may = 0;
            $jun = 0;
            $jul = 0;
            $aug = 0;
            $sep = 0;
            $oct = 0;
            $nov = 0;
            $dec = 0;
            foreach($value as $number=>$monthOp){
                
                    
               for($i=12;$i>=1;$i--){
                   if($monthOp == $i){
                       if($i == 1){
                           $jan += 1;
                       }
                       if($i == 2){
                           $feb += 1;
                       }
                       if($i == 3){
                           $mar += 1;
                       }
                       if($i == 4){
                           $apr += 1;
                       }
                       if($i == 5){
                           $may += 1;
                       }
                       if($i == 6){
                           $jun += 1;
                       }
                       if($i == 7){
                           $jul += 1;
                       }
                       if($i == 8){
                           $aug += 1;
                       }
                       if($i == 9){
                           $sep += 1;
                       }
                       if($i == 10){
                           $oct += 1;
                       }
                       if($i == 11){
                           $nov += 1;
                       }
                       if($i == 12){
                           $dec += 1;
                       }                        
                    }
                } 
            }
            
            if($dec){
               $newPanelDataArr[$key][12] = $dec; 
            }           
            if($nov){
               $newPanelDataArr[$key][11] = $nov; 
            }
             if($oct){
               $newPanelDataArr[$key][10] = $oct; 
            }
            if($sep){
               $newPanelDataArr[$key][9] = $sep; 
            }
            if($aug){
               $newPanelDataArr[$key][8] = $aug; 
            }
            if($jul){
               $newPanelDataArr[$key][7] = $jul; 
            }
            if($jun){
               $newPanelDataArr[$key][6] = $jun; 
            }
            if($may){
               $newPanelDataArr[$key][5] = $may; 
            }
            if($apr){
               $newPanelDataArr[$key][4] = $apr; 
            }
            if($mar){
               $newPanelDataArr[$key][3] = $mar; 
            }
            if($feb){
               $newPanelDataArr[$key][2] = $feb; 
            }            
            if($jan){
               $newPanelDataArr[$key][1] = $jan; 
            }
            $newPanelDataArr[$key]['total'] = $jan + $feb + $mar + $apr + $may + $jun + $jul + $aug +  $sep + $oct + $nov + $dec;
            
        }       
        
        return $newPanelDataArr;
    }
    
    public static function monthName($num){
        $monthsArr = 
        [
            'Январь' => 1,
            'Февраль' => 2,
            'Март' => 3,
            'Апрель' => 4,
            'Май' => 5,
            'Июнь' => 6,
            'Июль' => 7,
            'Август' => 8,
            'Сентябрь' => 9,
            'Октябрь' => 10,
            'Ноябрь' => 11,
            'Декабрь' => 12,            
        ];
        
        return array_search ($num, $monthsArr);
    }
    
    
}