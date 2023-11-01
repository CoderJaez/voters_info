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
     * @var string[]
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
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $userRules = [
        'fullname' => [
            'label' => 'Fullname',
            'rules' => 'required|min_length[4]',
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email',
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[8]',
        ],
        'confirm_password' => [
            'label' => 'Confirm password',
            'rules' => 'required|matches[password]',
        ]
    ];

    public array $voterRules = [
        'fullname' => [
            'label' => 'Fullname',
            'rules' => 'required|min_length[4]',
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email',
        ],
        'phone_number' => [
            'label' => 'Phone Number',
            'rules' => 'required|min_length[11]|max_length[12]|regex_match[/^09\d*$/]'
        ],
        'gender' => [
            'label' => 'Gender',
            'rules' => 'required'
        ],
        'address' => [
            'label' => 'Address',
            'rules' => 'required|min_length[10]'
        ],
        'voter_reg_number' => [
            'label' => 'Voter registration number',
            'rules' => 'required'
        ],
        'image' => [
            'label' => 'image',
            'rules' => 'uploaded[image]|max_size[image, 2048]|mime_in[image,image/jpg,image/png,image/jpeg]'
        ],


    ];

    public array $videoRules = [
        'Image' => [
            'label' => 'Image',
            'rules' => 'uploaded[Image]|max_size[Image, 2048]|mime_in[Image,image/jpg,image/png,image/jpeg]'
        ],
        'Title' => [
            'label' => 'Title',
            'rules' => 'required|min_length[4]'
        ],
        'Description' => [
            'label' => 'Description',
            'rules' => 'required|min_length[10]'
        ],
        // 'Video' => [
        //     'label' => 'Video',
        //     'rules' => 'uploaded[Video]|mime_in[Video, video/mp4, video/mov, video/obb], max_size[Video, 20480]'
        // ]

    ];
}
