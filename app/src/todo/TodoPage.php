<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldComponent;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;


class TodoPage extends Page
{
    private static $has_many = [
        'TodoObjects' => TodoObject::class,
        'TodoComments' => TodoComment::class,
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', GridField::create(
            'TodoObjects',
            'Todos',
            $this->TodoObjects(),
            GridFieldConfig_RecordEditor::create()
        ));
        return $fields;
    }
}
