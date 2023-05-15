<?php

use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FormAction;

class TodoPageController extends PageController
{
    private static $allowed_actions = [
        'CommentForm'
    ];

    public function CommentForm()
    {
        $form = Form::create(
            $this,
            'CommentForm',
            FieldList::create(
                TextField::create('Name'),
                TextareaField::create('Comment'),
            ),
            FieldList::create(
                FormAction::create('CreateComment', 'Kirim Komentar'),
            )
        );

        return $form;
    }

    public function CreateComment($data, $form)
    {
        $comment = TodoComment::create();
        $comment->TodoPageID = $this->ID;

        $form->saveInto($comment);
        $comment->write();

        return $this->redirectBack();
    }
}
