<?php
namespace Bluethinkinc\LowStockNotification\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bluethinkinc\LowStockNotification\Helper\Data;
use Magento\Framework\App\State;

class Bluethink extends Command
{
    /**
     * This is a state
     *
     * @var state $state
     */
     protected $state;
    /**
     * This is a emailHelperData
     *
     * @var emailHelperData $emailHelperData
     */
     private $emailHelperData;
    /**
     * This is a construct
     *
     * @param State $state
     * @param Data $HelperData
     */
    public function __construct(
        State $state,
        Data $HelperData
    ) {
        $this->HelperData = $HelperData;
        $this->state = $state;
        return parent::__construct();
    }

    /**
     * This is a configure function
     *
     * @return  configure
     */
    protected function configure()
    {
        $this->setName('bluethink:lowstocknotification');
        $this->setDescription('lowstocknotification command line');
        parent::configure();
    }

   /**
    * This is a execute
    *
    * @return execute
    * @param InputInterface $input
    * @param OutputInterface $output
    */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->state->setAreaCode(\Magento\Framework\App\Area::AREA_ADMINHTML);
        $data=$this->HelperData->synclowstocknotification();
        $output->writeln($data);
    }
}
