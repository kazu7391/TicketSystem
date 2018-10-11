<?php
/**
 * Created by PhpStorm.
 * User: My PC
 * Date: 11/10/2018
 * Time: 4:35 CH
 */

namespace Softdy\SupportTicketSystem\Model\ResourceModel\Ticket;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'ticket_id';
    protected $_eventPrefix = 'softdy_ticket_collection';
    protected $_eventObject = 'ticket_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Softdy\SupportTicketSystem\Model\Ticket', 'Softdy\SupportTicketSystem\Model\ResourceModel\Ticket');
    }
}