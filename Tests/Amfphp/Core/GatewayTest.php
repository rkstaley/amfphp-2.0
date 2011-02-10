<?php
/**
 *  This file part is part of amfPHP
 *
 * LICENSE
 *
 * This source file is subject to the license that is bundled
 * with this package in the file license.txt.
 */


require_once dirname(__FILE__) . '/../../../Amfphp/ClassLoader.php';
require_once dirname(__FILE__) . "/../../TestData/AmfTestData.php";
require_once dirname(__FILE__) . "/../../TestData/TestServicesConfig.php";

/**
 * Test class for Amfphp_Core_Gateway.
 * Generated by PHPUnit on 2010-12-09 at 11:56:28.
 */
class Amfphp_Core_GatewayTest extends PHPUnit_Framework_TestCase {


    public function testService() {
        $amfTestData = new AmfTestData();
        $config = new Amfphp_Core_Config();
        $testServiceConfig = new TestServicesConfig();
        $config->serviceFolderPaths = $testServiceConfig->serviceFolderPaths;
        $config->serviceNames2ClassFindInfo = $testServiceConfig->serviceNames2ClassFindInfo;
        $gateway = new Amfphp_Core_Gateway($amfTestData->mirrorServiceRequestPacket, array(), Amfphp_Core_Amf_Constants::CONTENT_TYPE, $config);
        $ret = $gateway->service();
        $this->assertEquals(bin2hex($amfTestData->mirrorServiceResponsePacket), bin2hex($ret));
    }

    public function testEmptyMessage(){
        $config = new Amfphp_Core_Config();
        $gateway = new Amfphp_Core_Gateway(null, array(), null, $config);
        $ret = $gateway->service();

        $this->assertTrue(strpos($ret, "field missing") != false);
        

    }


}

?>
