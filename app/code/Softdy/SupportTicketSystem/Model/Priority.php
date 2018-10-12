<?php

namespace Softdy\SupportTicketSystem\Model;


class Priority extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'softdy_ticket_priority';

    protected $_cacheTag = 'softdy_ticket_priority';

    protected $_eventPrefix = 'softdy_ticket_priority';

    protected $_idFieldName = 'priority_id';

    protected function _construct()
    {
        $this->_init('Softdy\SupportTicketSystem\Model\ResourceModel\Priority');
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

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData('priority_id');
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData('priority_id', $entityId);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * Set Title.
     */
    public function setName($title)
    {
        return $this->setData('name', $title);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData('status');
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData('status', $isActive);
    }
}