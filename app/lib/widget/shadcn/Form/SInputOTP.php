<?php
namespace App\Lib\Widget\Shadcn\Form;
use Adianti\Widget\Base\TElement;
class SInputOTP extends TElement
{
    public function __construct($slots = 6)
    {
        parent::__construct('div');
        $this->class = 's-input-otp';
        for ($i = 0; $i < $slots; $i++) {
            $input = new TElement('input');
            $input->class = 's-input-otp-slot';
            $input->setProperty('type', 'text');
            $input->setProperty('maxlength', '1');
            $input->setProperty('inputmode', 'numeric');
            $this->add($input);
        }
    }
}
