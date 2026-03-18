<?php
namespace App\Lib\Widget\Shadcn;

use Adianti\Widget\Base\TElement;

class SButton extends TElement
{
    public function __construct($value, $variant = 'default', $size = 'default')
    {
        parent::__construct('button');
        $this->add($value);
        
        $baseClass = 'inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 btn';
        
        $variants = [
            'default' => 'bg-primary text-primary-foreground shadow hover:bg-primary/90',
            'destructive' => 'bg-danger text-white shadow-sm hover:bg-danger/90',
            'outline' => 'border border-input bg-background shadow-sm hover:bg-accent hover:text-accent-foreground',
            'secondary' => 'bg-secondary text-secondary-foreground shadow-sm hover:bg-secondary/80',
            'ghost' => 'hover:bg-accent hover:text-accent-foreground',
            'link' => 'text-primary underline-offset-4 hover:underline'
        ];
        
        $sizes = [
            'default' => 'h-9 px-4 py-2',
            'sm' => 'h-8 rounded-md px-3 text-xs',
            'lg' => 'h-10 rounded-md px-8',
            'icon' => 'h-9 w-9'
        ];
        
        $vClass = $variants[$variant] ?? $variants['default'];
        $sClass = $sizes[$size] ?? $sizes['default'];
        
        $this->class = "$baseClass $vClass $sClass";
    }
}
