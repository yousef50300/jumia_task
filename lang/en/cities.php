<?php

return [
    'plural' => 'Cities',
    'singular' => 'City',
    'empty' => 'There are no Cities',
    'actions' => [
        'list' => 'List Cities',
        'show' => 'Show City',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit City',
        'delete' => 'Delete City',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The City has been created successfully.',
        'updated' => 'The City has been updated successfully.',
        'deleted' => 'The City has been deleted successfully.',
        'cant_deleted' => 'The City cant be deleted because it have a trip.',
    ],
    'attributes' => [
        'name' => 'City Name'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the City ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
