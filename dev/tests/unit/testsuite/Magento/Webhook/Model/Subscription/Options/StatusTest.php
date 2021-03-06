<?php
/**
 * \Magento\Webhook\Model\Subscription\Options\Status
 *
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
 * @category    Magento
 * @package     Magento_Webhook
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
namespace Magento\Webhook\Model\Subscription\Options;

class StatusTest extends \PHPUnit_Framework_TestCase
{
    public function testToOptionArray()
    {
        $translatorMock = $this->getMockBuilder('Magento\Core\Model\Translate')
            ->disableOriginalConstructor()
            ->getMock();
        $translatorMock->expects($this->any())
            ->method('translate')
            ->will($this->returnCallback(array($this, 'translateCallback')));
        $object = new \Magento\Webhook\Model\Subscription\Options\Status($translatorMock);
        $expectedArray = array(
            \Magento\Webhook\Model\Subscription::STATUS_ACTIVE => 'Active',
            \Magento\Webhook\Model\Subscription::STATUS_REVOKED => 'Revoked',
            \Magento\Webhook\Model\Subscription::STATUS_INACTIVE => 'Inactive',
        );
        $this->assertEquals($expectedArray, $object->toOptionArray());
    }

    /**
     * Translates array of inputs into string
     *
     * @param array $inputs
     * @return string
     */
    public static function translateCallback(array $inputs)
    {
        return implode("\n", $inputs);
    }
}
