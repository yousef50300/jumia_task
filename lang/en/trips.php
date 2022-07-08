<?php

return [
    'plural' => 'Trips',
    'singular' => 'Trip',
    'empty' => 'There are no Trips',
    'actions' => [
        'list' => 'List Trips',
        'show' => 'Show Trip',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Trip',
        'delete' => 'Delete Trip',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The Trip has been created successfully.',
        'updated' => 'The Trip has been updated successfully.',
        'deleted' => 'The Trip has been deleted successfully.',
        'cant_deleted' => 'The Trip cant be deleted because it have a trip.',
    ],
    'attributes' => [
        'name' => 'Trip Name',
        'route' => 'Route Name',
        'bus_number' => 'Bus Number',
        'stops' => 'Crosses Over Stations',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the Trip ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
