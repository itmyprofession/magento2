<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Stdlib;

/**
 * Magento\Stdlib\StringTest test case
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Stdlib\String
     */
    protected $_string;

    protected function setUp()
    {
        $this->_string = new String();
    }

    /**
     * @covers \Magento\Stdlib\String::__construct
     * @covers \Magento\Stdlib\String::split
     */
    public function testStrSplit()
    {
        $this->assertEquals(array(), $this->_string->split(''));
        $this->assertEquals(array('1', '2', '3', '4'), $this->_string->split('1234', 1));
        $this->assertEquals(array('1', '2', ' ', '3', '4'), $this->_string->split('12 34', 1, false, true));
        $this->assertEquals(array(
                '12345', '123', '12345', '6789'
            ), $this->_string->split('12345  123    123456789', 5, true, true));
    }

    /**
     * @covers \Magento\Stdlib\String::__construct
     * @covers \Magento\Stdlib\String::splitInjection
     */
    public function testSplitInjection()
    {
        $string = '1234567890';
        $this->assertEquals('1234 5678 90', $this->_string->splitInjection($string, 4));
    }

    /**
     * @covers \Magento\Stdlib\String::cleanString
     */
    public function testCleanString()
    {
        $string = '12345';
        $this->assertEquals($string, $this->_string->cleanString($string));
    }

    /**
     * @covers \Magento\Stdlib\String::strpos
     */
    public function testStrpos()
    {
        $this->assertEquals(1, $this->_string->strpos('123', 2));
    }
}
