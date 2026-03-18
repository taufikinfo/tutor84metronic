<?php
/**
 * DatagridRestView
 *
 * @version    1.0
 * @package    samples
 * @subpackage tutor
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    https://adiantiframework.com.br/license-tutor
 */
class DatagridRestView extends TPage
{
    private $datagrid;
    
    public function __construct()
    {
        parent::__construct();
        
        // creates one datagrid
        $this->datagrid = new BootstrapDatagridWrapper(new TDataGrid);
        
        // create the datagrid columns
        $id     = new TDataGridColumn('id',     'Id',    'center', '25%');
        $name   = new TDataGridColumn('name',   'Name',  'left',   '25%');
        $phone  = new TDataGridColumn('phone',  'Phone', 'left',   '25%');
        $email  = new TDataGridColumn('email',  'Email', 'left',   '25%');
        
        // add the columns to the datagrid, with actions on column titles, passing parameters
        $this->datagrid->addColumn($id);
        $this->datagrid->addColumn($name);
        $this->datagrid->addColumn($phone);
        $this->datagrid->addColumn($email);
        
        // creates two datagrid actions
        $action1 = new TDataGridAction([$this, 'onView'],   ['name'=>'{name}',  'email' => '{email}'] );
        
        // custom button presentation
        $action1->setUseButton(TRUE);
        
        // add the actions to the datagrid
        $this->datagrid->addAction($action1, 'View', 'fa:search blue');
        
        // creates the datagrid model
        $this->datagrid->createModel();
        
        ################## START POPULATING DATA ############################
        
        $this->datagrid->clear();
        
        try
        {
            $url = 'https://adiantiframework.com.br/ws/exemplo_rest.php';
            $payload = [];
            $return = AdiantiHttpClient::request($url, 'GET', $payload, 'Basic Aidgbs6dfg7mpm9459ptdm7756k4hgjk6odiughps4ot6i86br8g76d98fg7');
            
            if ($return)
            {
                foreach ($return as $row)
                {
                    // add an regular object to the datagrid
                    $item = new StdClass;
                    $item->id      = $row->{'id'};
                    $item->name    = $row->{'nome'};
                    $item->phone   = $row->{'fone'};
                    $item->email   = $row->{'email'};
                    $this->datagrid->addItem($item);
                }
            }
        }
        catch (Exception $e)
        {
            new TMessage('error', $e->getMessage());
        }
        
        ################## FINISH POPULATING DATA ############################
        
        $panel = new TPanelGroup(_t('Datagrid Rest query'));
        $panel->add($this->datagrid)->style = 'overflow-x:auto';
        $panel->addFooter('footer');
        
        // wrap the page content using vertical box
        $vbox = new TVBox;
        $vbox->style = 'width: 100%';
        $vbox->add(new TXMLBreadCrumb('menu.xml', __CLASS__));
        $vbox->add($panel);

        parent::add($vbox);
    }
    
    
    /**
     * Executed when the user clicks at the view button
     */
    public static function onView($param)
    {
        // get the parameter and shows the message
        $name  = $param['name'];
        $email = $param['email'];
        new TMessage('info', "The name is: <b>$name</b> <br> The email is : <b>$email</b>");
    }
}
