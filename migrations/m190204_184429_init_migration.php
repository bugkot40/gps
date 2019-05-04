<?php

use yii\db\Migration;

/**
 * Class m190204_184429_init_migration
 */
class m190204_184429_init_migration extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $ps = [
            ['ПС134 Суздальская', 'ПС-134'],
            ['ПС-124 Гражданская', 'ПС-124'],
            ['ПС-29 Сосновская', 'ПС-29'],
            ['ПС-103 Завод Светлана', 'ПС-103'],
            ['ПС-370 ПГВ-2 Светлана', 'ПС-370'],
            ['ПС-93 Завод Либкнехта', 'ПС-93']
        ];

        $mixs = [
            'ntd' => [
                ['Правила по охране труда при эксплуатации электроустановок', 'ПОТ'],
                ['Правила технической эксплуатации электрических станций и сетей РФ', 'ПТЭ'],
                ['Правила пожарной безопасности для энергетических предприятий, средства пожаротушения', 'ППБ'],
                ['Правила устройства электроустановок', 'ПУЭ'],
                ['Инструкция по применению и испытанию средств защиты, используемых в электроустановках', 'СЗ'],
                ['Инструкция по оказанию первой помощи при несчастных случаях на производстве', 'НС'],
            ],
            'rza' => [
                ['Правила технического обслуживания устройств релейной защиты, электроавтоматики, дистанционного управления и сигнализации электростанций и подстанций 110-750кВ', 'ТО-110'],
                ['Правила технического обслуживания устройств релейной защиты и электроавтоматики электрических сетей 0,4-35кВ', 'ТО-35'],
                ['Инструкция по организации и производству работ в устройствах релейной защиты и электроавтоматики электростанций и подстанций', 'ИНСТР.РЗА'],
                ['Теория релейной защиты', 'ТЕОР.РЗ'],
                ['Структура ЦВВР, ГПС-370,положения МСРЗ, должностная инструкция электромонтера по ремонту РЗА 6 разряда', 'ЦВВР'],
                ['ГПС-370, оборудование, первичные и вторичные схемы, РЗА подстанций', 'ГПС-370'],
            ],
            'base' => [
                ['НС - основные вопросы для собеседования', 'НС(осн)'],
                ['ППБ - основные вопросы для собеседования', 'ППБ(осн)'],
                ['СИЗ - основные вопросы для собеседования', 'СИЗ(осн)'],
                ['ПОТ - основные вопросы для собеседования', 'ПОТ(осн)'],
                ['ГПС, РЗА - основные вопросы для собеседования', 'ГПС(осн)'],
            ],

        ];


        foreach ($ps as $element) {
            $this->insert('ps', [
                'name' => $element[0],
                'label' => $element[1],
            ]);
        }

        foreach ($mixs as $mix => $tests) {
            if ($mix === 'ntd') $mixId = 1;
            if ($mix === 'rza') $mixId = 2;
            if ($mix === 'base') $mixId = null;

            foreach ($tests as $test) {
                $this->insert('test', [
                    'mix_id' => $mixId,
                    'name' => $test[0],
                    'label' => $test[1],
                ]);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('test');
        $this->delete('ps');

    }

}