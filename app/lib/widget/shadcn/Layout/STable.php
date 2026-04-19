<?php

namespace App\Lib\Widget\Shadcn\Layout;

use Adianti\Widget\Base\TElement;

class STable extends TElement
{
    private $headers = [];
    private $rows = [];
    private $colWidths = [];

    public function __construct()
    {
        parent::__construct('div');
        $this->class = 's-table-wrapper w-100 overflow-auto border s-radius s-background s-border';
    }

    public function setHeaders($headers, $widths = [])
    {
        $this->headers = $headers;
        $this->colWidths = $widths;
        return $this;
    }

    public function addRow($cells)
    {
        $this->rows[] = $cells;
        return $this;
    }

    public function show()
    {
        $table = new TElement('table');
        $table->class = 's-table w-100';

        if (!empty($this->headers)) {
            $thead = new TElement('thead');
            $tr = new TElement('tr');
            $tr->class = 'border-bottom';
            foreach ($this->headers as $index => $col) {
                $th = new TElement('th');
                $th->class = 'text-start text-muted fw-medium py-3 px-4';
                if (isset($this->colWidths[$index])) {
                    $th->style = "width: {$this->colWidths[$index]};";
                }
                $th->add($col);
                $tr->add($th);
            }
            $thead->add($tr);
            $table->add($thead);
        }

        $tbody = new TElement('tbody');
        foreach ($this->rows as $cells) {
            $tr = new TElement('tr');
            $tr->class = 'border-bottom transition-colors hover-bg-muted';
            foreach ($cells as $cell) {
                $td = new TElement('td');
                $td->class = 'py-3 px-4 text-dark';
                $td->style = 'vertical-align: middle;';
                if ($cell instanceof TElement) {
                    $td->add(clone $cell);
                } else {
                    $td->add($cell);
                }
                $tr->add($td);
            }
            $tbody->add($tr);
        }
        $table->add($tbody);
        parent::add($table);

        parent::show();
    }
}
