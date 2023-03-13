<?php

namespace Bluethinkinc\LowStockNotification\Controller\Adminhtml\Notification;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Bluethinkinc\LowStockNotification\Cron\Synclowstocknotification;

class Updateadminlowstock extends Action
{

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var Synclowstocknotification
     */
    protected $synclowstocknotification;

    /**
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Synclowstocknotification $synclowstocknotification
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        Synclowstocknotification $synclowstocknotification
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->synclowstocknotification = $synclowstocknotification;
        parent::__construct($context);
    }

    /**
     * Get message data
     *
     * @return \Magento\Framework\App\ResponseInterface|Json|
     * @return \Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        $message=$this->synclowstocknotification->execute();
        $result = $this->resultJsonFactory->create();
        return $result->setData($message);
    }
}
