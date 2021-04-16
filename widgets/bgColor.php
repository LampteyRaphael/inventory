<?php


namespace app\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class bgColor extends  Widget
{

    public  $bgcolor='white';
    
    public function init()
    {
        parent::init();
        ob_start();
    }


    public function run()
    {
        parent::run();

        $output=ob_get_clean();

      return  Html::tag('div',$output,[

            'style'=>'background-color:'.$this->bgcolor,

        ]);
    }

}