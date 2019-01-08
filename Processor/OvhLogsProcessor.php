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
     * @var array|null
     */
    protected $extraFields;

    /**
     * OvhLogProcessor constructor.
     *
     * @param string     $token
     * @param array|null $extraFields
     */
    public function __construct(string $token, array $extraFields = null)
    {
        $this->token = $token;
        $this->extraFields = $extraFields;
    }

    /**
     * @param array $record
     *
     * @return array
     */
    public function processRecord(array $record)
    {
        $record['extra']['X-OVH-TOKEN'] = $this->token;

        if ($this->extraFields !== null) {
            foreach ($this->extraFields as $extraFieldName => $extraFieldValue) {
                $record['extra'][$extraFieldName] = $extraFieldValue;
            }
        }

        return $record;
    }
}
