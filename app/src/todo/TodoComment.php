<?php

use SilverStripe\ORM\DataObject;

class TodoComment extends DataObject
{
    private static $db = [
        'Name' => 'Text',
        'Comment' => 'Text',
    ];

    private static $has_one = [
        'TodoPage' => TodoPage::class,
    ];
}
