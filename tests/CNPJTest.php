<?php

namespace Vsilva472\phpCNPJ;

use PHPUnit\Framework\TestCase;

class CNPJTest extends TestCase
{
    public function testOnlyShouldAcceptValidCNPJ()
    {
        $validator = new CNPJ();
        
        $this->assertFalse( $validator->validate( '00000000000000' ) );
        $this->assertFalse( $validator->validate( '00.000.000/0000-00' ) );
        $this->assertFalse( $validator->validate( 'xxxxxxxxxx' ) );
        $this->assertFalse( $validator->validate( 'asas456.4ds-c56475%¨VFAS %s <t>6dasd-c' ) );
        $this->assertFalse( $validator->validate( '12:45' ) );
        $this->assertFalse( $validator->validate( '' ) );
        $this->assertFalse( $validator->validate( null ) );
        $this->assertFalse( $validator->validate( '12.123.456/1234-45' ) );
        $this->assertFalse( $validator->validate( '12123456123445' ) );
        $this->assertFalse( $validator->validate( 12123456123445 ) );

        // http://www.geradorcnpj.com/
        $this->assertTrue( $validator->validate( '72829845000103' ) );
        $this->assertTrue( $validator->validate( 72829845000103 ) );
        $this->assertTrue( $validator->validate( '72.829.845/0001-03' ) );

        $this->assertTrue( $validator->validate( '97.538.791/0001-40' ) );
        $this->assertTrue( $validator->validate( '97538791000140' ) );
        $this->assertTrue( $validator->validate( 97538791000140 ) );

        $this->assertTrue( $validator->validate( '22.648.566/0001-67' ) );
        $this->assertTrue( $validator->validate( '22648566000167' ) );
        $this->assertTrue( $validator->validate( 22648566000167 ) );

        // https://www.4devs.com.br/gerador_de_cnpj
        $this->assertTrue( $validator->validate( '27.828.792/0001-43' ) );
        $this->assertTrue( $validator->validate( '27828792000143' ) );
        $this->assertTrue( $validator->validate( 27828792000143 ) );

        $this->assertTrue( $validator->validate( '16.157.011/0001-10' ) );
        $this->assertTrue( $validator->validate( '16157011000110' ) );
        $this->assertTrue( $validator->validate( 16157011000110 ) );

        $this->assertTrue( $validator->validate( '02.296.101/0001-87' ) );
        $this->assertTrue( $validator->validate( '02296101000187' ) );

        $this->assertTrue( $validator->validate( '72.886.080/0001-35' ) );
        $this->assertTrue( $validator->validate( '72886080000135' ) );
        $this->assertTrue( $validator->validate( 72886080000135 ) );

        // http://www.gerardocumentos.com.br/?pg=gerador-de-cnpj
        $this->assertTrue( $validator->validate( '30.526.681/0001-97' ) );
        $this->assertTrue( $validator->validate( '30526681000197' ) );
        $this->assertTrue( $validator->validate( 30526681000197 ) );

        $this->assertTrue( $validator->validate( '42.334.144/0001-24' ) );
        $this->assertTrue( $validator->validate( '42334144000124' ) );
        $this->assertTrue( $validator->validate( 42334144000124 ) );

        // https://servicos.receitafederal.gov.br/servico/cnpj-alfa/simular
        $this->assertTrue( $validator->validate('T5.5BH.TLT/0001-86') );
        $this->assertTrue( $validator->validate('33.5D9.VZD/0001-80') );
        $this->assertTrue( $validator->validate('ZV.KA8.L1Y/0001-69') );
        $this->assertTrue( $validator->validate('2S.X98.360/0001-13') );
        $this->assertTrue( $validator->validate('N8.6DG.332/0001-00') );

        // invalidos
        $this->assertFalse( $validator->validate('N8.6DG.332/0001-25') );
        $this->assertFalse( $validator->validate('45.RTY.FGD/D454-HG') );
        $this->assertFalse( $validator->validate('AA.AAA.AAA/AAAA-00') );
        $this->assertFalse( $validator->validate('BB.BBB.BBB/BBBB-BB') );
        $this->assertFalse( $validator->validate('CC.CCC.CCC/CCCC-CC') );
        $this->assertFalse( $validator->validate('DD.DDD.DDD/DDDD-DD') );
    }
}
