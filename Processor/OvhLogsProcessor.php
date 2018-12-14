<?php

namespace Chaplean\Bundle\OvhLogsBundle\Processor;

/**
 * Class OvhLogsProcessor.
 *
 * @package   Chaplean\Bundle\OvhLogsBundle\Processor
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2018 Chaplean (http://www.chaplean.coop)
 * @version   1.0.0
 */
class OvhLogsProcessor
{
    /**
     * @var string
     */
    protected $token;

    /**
     * OvhLogProcessor constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param array $record
     *
     * @return array
     */
    public function processRecord(array $record)
    {
        $record['extra']['X-OVH-TOKEN'] = $this->token;

        return $record;
    }
}
