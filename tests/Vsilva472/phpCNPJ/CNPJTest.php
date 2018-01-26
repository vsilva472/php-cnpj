<?php

namespace Vsilva472\phpCNPJ;

use PHPUnit_Framework_TestCase as PHPUnit;

class CNPJTest extends PHPUnit
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
    }
}
