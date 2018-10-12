<?php

namespace Softdy\SupportTicketSystem\Model\ResourceModel\Ticket;

/* use required classes */
use Magento\Framework\Data\Collection\EntityFactoryInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'ticket_id';
    protected $_eventPrefix = 'softdy_ticket_collection';
    protected $_eventObject = 'ticket_collection';

    /**
     * @param EntityFactoryInterface $entityFactory,
     * @param LoggerInterface        $logger,
     * @param FetchStrategyInterface $fetchStrategy,
     * @param ManagerInterface       $eventManager,
     * @param StoreManagerInterface  $storeManager,
     * @param AdapterInterface       $connection,
     * @param AbstractDb             $resource
     */
    public function __construct(
        EntityFactoryInterface $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        StoreManagerInterface $storeManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null
    ) {
        $this->_init('Softdy\SupportTicketSystem\Model\Ticket', 'Softdy\SupportTicketSystem\Model\ResourceModel\Ticket');
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->storeManager = $storeManager;
    }

    protected function _initSelect()
    {
        parent::_initSelect();

        $this->getSelect()->joinLeft(
                ['secondTable' => $this->getTable('softdy_ticket_department')],
                'main_table.department_id = secondTable.department_id',
                ['secondTable.name as departmentName']
            )->joinLeft(
                ['thirdTable' => $this->getTable('softdy_ticket_priority')],
                'main_table.priority_id = thirdTable.priority_id',
                ['thirdTable.name as priorityName']
            )->joinLeft(
                ['fourthTable' => $this->getTable('customer_entity')],
                'main_table.customer_id = fourthTable.entity_id',
                ['fourthTable.firstname as customerName']
            );
    }
}