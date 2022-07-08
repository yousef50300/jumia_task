<?php

return [
    'plural' => 'Routes',
    'singular' => 'Route',
    'empty' => 'There are no Routes',
    'actions' => [
        'list' => 'List Routes',
        'show' => 'Show Route',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Route',
        'delete' => 'Delete Route',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Route has been created successfully.',
        'updated' => 'The Route has been updated successfully.',
        'deleted' => 'The Route has been deleted successfully.',
        'cant_deleted' => 'The Route cant be deleted because it have a Route.',
    ],
    'attributes' => [
        'name' => 'Route Name',
        'start_destination' => 'Start Destination',
        'end_destination' => 'End Destination'
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Route ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
