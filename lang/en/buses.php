<?php

return [
    'plural' => 'Buses',
    'singular' => 'Bus',
    'empty' => 'There are no Buses',
    'actions' => [
        'list' => 'List Buses',
        'show' => 'Show Bus',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Bus',
        'delete' => 'Delete Bus',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Bus has been created successfully.',
        'updated' => 'The Bus has been updated successfully.',
        'deleted' => 'The Bus has been deleted successfully.',
        'cant_deleted' => 'The Bus cant be deleted because it have a trip.',
    ],
    'attributes' => [
        'bus_number' => 'Bus Number'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Bus ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
