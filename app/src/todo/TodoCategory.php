<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class TodoCategory extends DataObject
{
    private static $db = [
        'Title' => 'Text',
    ];

    private static $belongs_many_many = [
        'TodoObjects' => TodoObject::class,
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        return new FieldList(
            TextField::create('Title'),
        );
    }
}
