<?php

use Adianti\Widget\Form\TForm;
use Adianti\Widget\Form\TField;
use Adianti\Control\TAction;
use Adianti\Wrapper\MetroFormBuilder;
use Adianti\Widget\Base\AdiantiWidgetInterface;

class KContainer
{
    public $name;
    private $form;
    private $schema = [];
    private $fields = [];
    private $fieldsFormatted = [];
    private $actions = [];

    public static function make($name)
    {
        $instance = new self();
        $instance->form = new MetroFormBuilder($name);
        $instance->name = $name;
        return $instance;
    }

    public function schema($schema)
    {
        $this->schema = $schema;
        $extractedFields = [];
        foreach ($this->schema as $group) {
            if (is_object($group) && method_exists($group, 'getFields')) {
                $extractedFields = array_merge($extractedFields, $group->getFields());
            } elseif ($group instanceof TField) {
                $extractedFields[] = $group;
            } elseif ($group instanceof KField) {
                // Allows direct placement of KField inside root schema
                $inner = $group->getField();
                if ($inner instanceof TField) {
                    $extractedFields[] = $inner;
                }
            }
        }
        foreach ($extractedFields as $field) {
            if ($field instanceof TField) {
                $this->fields[] = $field;
                $this->form->addField($field);
            }
        }
        return $this;
    }

    public function columns($columns)
    {
        // Handle column logic if necessary
        return $this;
    }

    public function setFields($fields)
    {
        return $this->form->setFields($fields);
    }

    public function getField($name)
    {
        return $this->form->getField($name);
    }

    public function addAction($label, TAction $action, $icon = 'fa:save', $name = null)
    {
        $label_info = ($label instanceof TLabel) ? $label->getValue() : $label;
        $name = $name ?? 'btn_' . strtolower(str_replace(' ', '_', $label_info));

        $button = new TButton($label, $action, $icon);
        $this->form->addField($button);

        $button->setAction($action, $label);
        $button->setImage($icon);
        $this->actions[] = $button;

        return $button;
    }

    public function addField($object)
    {
        if ($object instanceof AdiantiWidgetInterface) {
            $this->fields[] = $object;
            $this->form->addField($object);
        }
    }

    public function setData($data)
    {
        if (!is_object($data)) {
            return;
        }


        foreach ($this->fields as $field) {
            if ($field instanceof TField) {
                $name = $field->getName();
                if (!empty($name) && (isset($data->$name) || property_exists($data, $name))) {
                    $field->setValue($data->$name);
                }
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getData($class = 'stdClass')
    {
        return $this->form->getData($class);
    }

    public function clear($keepDefaults = false)
    {
        $this->form->clear($keepDefaults);
    }

    public function show()
    {
        echo $this->render()->show();
    }

    public function render()
    {
        $formElement = new TForm($this->name);
        $formElement->{'class'} = 'form-horizontal';
        $formElement->{'type'} = 'bootstrap';
        $formElement->{'id'} = $this->name;

        $row = new TElement('div');
        $row->{'class'} = 'row';
        foreach ($this->schema as $group) {
            $row->add($group->render());
        }
        $formElement->add($row);

        foreach ($this->actions as $action) {
            $formElement->add($action);
        }

        return $formElement;
    }

    public function enableCSRFProtection()
    {
        $this->form->enableCSRFProtection();
    }

    public function enableClientValidation()
    {
        $this->form->enableClientValidation();
    }

    public function hide()
    {
        $this->form->hide();
    }

    public function getId()
    {
        return $this->form->getId();
    }

    public function setFieldSizes($size)
    {
        $this->form->setFieldSizes($size);
    }

    public function getActions()
    {
        return $this->form->getActions();
    }

    public function validate()
    {
        return $this->form->validate();
    }
}
