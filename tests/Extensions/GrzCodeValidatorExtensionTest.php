<?php

namespace AvtoDev\ExtendedLaravelValidator\Tests\Extensions;

use AvtoDev\ExtendedLaravelValidator\Extensions\GrzCodeValidatorExtension;

/**
 * Class GrzCodeValidatorExtensionTest.
 */
class GrzCodeValidatorExtensionTest extends AbstractExtensionTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getExtensionClassName()
    {
        return GrzCodeValidatorExtension::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidValues()
    {
        return [
            // Слишком длинные
            'Р394242КК190',
            'С73321НХ197',
            'Е7350МО750',
            'М396СРХ46',
            'А137НОО89',
            'К898КМ4054',
            'К8948КМ404',

            // Слишком короткие
            'У752НХ1',
            'А548ВР7',
            'Н58ХС38',
            'Е47ЕВ190',
            'О386А40',
            'С06ОУ777',
            'Р295К102',

            // Содержащие пробелы
            'Р295 КА102',
            'Р239УЕ777 ',
            ' О461ОВ750',
            '  К005АВ77 ',
            'Е 029 ХВ 70',

            // Содержащие латиницу
            'Т085KР123',
            'У700КX61',
            'K988СC82',
            'Т039КP60',
            'E751УХ197',
            'С572EY777',

            // Содержащие запрещенные символы
            'Н416ТЯ161',
            'Ю477ЕМ178',
            'Н090ЫН777',
            'Ф399УН777',
            'Е986НЪ199',
            'М441ЕЦ73',
            'Р842ЭН777',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getValidValues()
    {
        return [
            // Валидные номера прицепов
            'АА0001177',
            'КК3921090',
            'УК868026',
            // В нижнем регистре
            'аа0001177',
            'кк3921090',
            'ук868026',

            // И эти тоже валидные
            '0001АА77',
            '3922АА190',
            '8688АА26',
            // В нижнем регистре
            '0001аа77',
            '3922аа190',
            '8688аа26',

            // В нижнем регистре
            'а825мс716',
            'р392кк190',
            'с731нх197',
            'е750мо750',
            'м396сх46',

            // И "обычные" номера для РФ
            'А825МС716',
            'Р392КК190',
            'С731НХ197',
            'Е750МО750',
            'М396СХ46',
            'А137НО89',
            'К898КМ40',
            'О772ТХ197',
            'В771ЕК126',
            'Х894СВ59',
            'Е373ТА73',
            'А777АА77',
            'О704КО190',
            'У868УК26',
            'М824РН78',
            'Т149ОЕ190',
            'Т293ТА178',
            'О476ЕЕ750',
            'В168ТС190',
            'У460УА77',
            'Т258СА77',
            'С475РУ777',
            'Р295ЕЕ178',
            'Х918УУ116',
            'Х116РЕ96',
            'У888ЕК99',
            'О292ОМ77',
            'С989ЕР72',
            'К324МУ750',
            'Е228РХ33',
            'О166РУ174',
            'Н492ТН197',
            'К206МХ32',
            'Р515ЕР19',
            'Н416ТЕ161',
            'У477ЕМ178',
            'Н090РН777',
            'В399УН777',
            'Е986НХ199',
            'М441ЕЕ73',
            'Р842СН777',
            'У914ВХ123',
            'Р181СК161',
            'У371ВН142',
            'У752НХ178',
            'А548ВР750',
            'Н580ХС38',
            'Е427ЕВ190',
            'О386АА40',
            'С061ОУ777',
            'Р295КА102',
            'Р239УЕ777',
            'О461ОВ750',
            'К005АВ77',
            'Е029ХВ70',
            'У956УС777',
            'А528КТ37',
            'Р602ВС86',
            'Р048ОА750',
            'Е251ВК82',
            'Е966РА777',
            'Н340АХ199',
            'Т555СН42',
            'К052ОУ178',
            'М333МВ161',
            'А028ЕУ178',
            'С326ХО199',
            'С976РТ98',
            'Н388ЕУ750',
            'М770РВ161',
            'М828МР02',
            'О377ЕТ750',
            'Е697ХС163',
            'Т612ХХ47',
            'В750КО777',
            'Т085КР123',
            'У700КХ61',
            'К988СС82',
            'Т039КР60',
            'Е751УХ197',
            'С572ЕУ777',
            'Е393МН33',
            'С552ВХ102',
            'Н327СМ777',
            'А284АР777',
            'У606КЕ33',
            'У828ХК47',
            'О590ТТ98',
            'У092СУ98',
            'О168РЕ197',
            'Т900ММ77',
            'Т462КО750',
            'Р012МА34',
            'У188РУ174',
            'В164ОЕ190',
            'О832ВТ31',
            'Е237ОА77',
            'А098АА99',
            'Е105ТУ777',
            'Е683СВ777',
            'М010ЕЕ26',
            'В199ХН199',
        ];
    }
}
