<?php

namespace Test\Chaplean\Bundle\OvhLogsBundle\Processor;

use Chaplean\Bundle\OvhLogsBundle\Processor\OvhLogsProcessor;
use PHPUnit\Framework\TestCase;

/**
 * Class OvhLogsProcessor.
 *
 * @package   Tests\Chaplean\Bundle\OvhLogsBundle\Processor
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2018 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class OvhLogsProcessorTest extends TestCase
{
    /**
     * @covers \Chaplean\Bundle\OvhLogsBundle\Processor\OvhLogsProcessor::__construct()
     * @covers \Chaplean\Bundle\OvhLogsBundle\Processor\OvhLogsProcessor::processRecord()
     *
     * @return void
     */
    public function testProcessRecordAddsTheToken()
    {
        $processor = new OvhLogsProcessor('token');
        $result = $processor->processRecord([]);

        $this->assertSame(['extra' => ['X-OVH-TOKEN' => 'token']], $result);
    }
}
