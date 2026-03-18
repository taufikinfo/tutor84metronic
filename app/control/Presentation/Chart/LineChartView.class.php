<?php
/**
 * Chart
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    https://adiantiframework.com.br/license-tutor
 */
class LineChartView extends TPage
{
    /**
     * Class constructor
     * Creates the page
     */
    public function __construct( $show_breadcrumb = true )
    {
        parent::__construct();
        
        $chart = new TLineChart;
        $chart->setTitle('Accesses by day');
        $chart->setXLabels(['Day 1', 'Day 2', 'Day 3']);
        $chart->addDataset('Value 1', [120,100,140]);
        $chart->addDataset('Value 2', [140,120,160]);
        $chart->addDataset('Value 3', [160,140,180]);
        
        $panel = new TPanelGroup;
        $panel->add($chart);
        
        // add the template to the page
        $container = new TVBox;
        $container->style = 'width: 100%';
        if ($show_breadcrumb)
        {
            $container->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        }
        $container->add($panel);
        parent::add($container);
    }
}
