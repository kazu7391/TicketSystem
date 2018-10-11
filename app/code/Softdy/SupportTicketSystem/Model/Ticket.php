<?php

namespace Softdy\SupportTicketSystem\Model;

class Ticket extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'softdy_ticket';

    protected $_cacheTag = 'softdy_ticket';

    protected $_eventPrefix = 'softdy_ticket';

    protected function _construct()
    {
        $this->_init('Softdy\SupportTicketSystem\Model\ResourceModel\Ticket');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}