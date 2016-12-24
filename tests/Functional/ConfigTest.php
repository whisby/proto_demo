<?php

namespace Tests\Functional;
use Proto;
use Proto\Data;


class ConfigTest extends BaseTestCase
{
 
    /**
    * Test That We Can Autoload Stuff From Bin
    */
    public function testbinAutoloaderWorks()
    {
        $test = Proto\ProtoConfig::test();
        $this->assertTrue($test);
    }


    /**
    * Test That We Can Autoload Stuff From Bin
    */
    public function testNavData()
    {
        $test = Proto\Data\NavData::getItems();
        $this->assertTrue(is_array($test));
    }




}