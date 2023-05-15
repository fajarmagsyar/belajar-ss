<?php

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\CheckboxSetField;


class TodoObject extends DataObject
{
    private static $db = [
        'Title' => 'Text',
        'Description' => 'Text',
    ];

    private static $has_one = [
        'TodoPage' => TodoPage::class,
        'TodoSource' => File::class,
    ];

    private static $many_many = [
        'TodoCategories' => TodoCategory::class,
    ];

    private static $owns = [
        'TodoSource'
    ];

    /**
     * CMS Fields
     * @return FieldList
     */
    public function getCMSFields()
    {
        return new FieldList(
            TextField::create('Title'),
            TextareaField::create('Description'),
            UploadField::create('TodoSource'),
            CheckboxSetField::create('TodoCategories', 'Categories', TodoCategory::get()),
        );
    }
}
