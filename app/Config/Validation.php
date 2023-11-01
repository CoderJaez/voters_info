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
        'image' => [
            'label' => 'Image',
            'rules' => 'uploaded[image]|max_size[image,2048]|mime_in[image,image/jpg,image/png,image/jpeg]'
        ],
        'title' => [
            'label' => 'Title',
            'rules' => 'required|min_length[4]'
        ],
        'desc' => [
            'label' => 'Description',
            'rules' => 'required|min_length[10]'
        ],
        'video' => [
            'label' => 'Video',
            'rules' => 'uploaded[video]|mime_in[video,video/mp4,video/quicktime,video/ogg,video/webm,video/x-msvideo]|max_size[video,20480]'
        ]

    ];

    public array $updateVideoRules = [
        'title' => [
            'label' => 'Title',
            'rules' => 'required|min_length[4]'
        ],
        'desc' => [
            'label' => 'Description',
            'rules' => 'required|min_length[10]'
        ],
    ];
}
