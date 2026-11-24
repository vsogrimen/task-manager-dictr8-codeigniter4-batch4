<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'validation/single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $task = [
        'title'       => 'required|min_length[3]|max_length[150]',
        'description' => 'permit_empty|max_length[2000]',
        'status'      => 'required|in_list[pending,in_progress,completed]',
        'due_date'    => 'permit_empty|valid_date[Y-m-d]',
    ];

    public array $task_errors = [
        'title' => [
            'required'   => 'Every task needs a title.',
            'min_length' => 'Make the title at least 3 characters long.',
        ],
    ];
}
