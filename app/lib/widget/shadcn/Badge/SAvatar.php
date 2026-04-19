<?php
namespace App\Lib\Widget\Shadcn\Badge;
use Adianti\Widget\Base\TElement;

class SAvatar extends TElement
{
    public function __construct($src = '', $fallback = '')
    {
        parent::__construct('span');
        $this->class = 's-avatar';
        
        if ($src) {
            $img = new TElement('img');
            $img->src = $src;
            $img->alt = $fallback ?: 'Avatar';
            $this->add($img);
        } elseif ($fallback) {
            $fb = new TElement('span');
            $fb->class = 's-avatar-fallback';
            $fb->add($fallback);
            $this->add($fb);
        }
    }
}
