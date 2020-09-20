<?php

return [
    'invitation' => [
        'guest' => [
            'subject' => 'Invitation to jain an organization',
            'body' => "Hello,<br /><br />You just had been invited to join the organization :name. In order to complete your membership, please create an account on the developers dedicated platform by following this link :<br /> <a href=':url' target='_blank'>:url</a><br /><br />Hoping to see you soon,<br />The JustAuthMe team.",
            'action' => 'Create an account'
        ]
    ],
    'email_validation' => [
        'subject' => 'Your e-mail address confirmation',
        'body' => "Hello,<br /><br />Please confirm your e-mail address by following this link: <br /> <a href=':url' target='_blank'>:url</a><br /><br />Hoping to see you soon,<br />The JustAuthMe team.",
        'action' => 'Confirm my e-mail'
    ],
    'password_reset' => [
        'subject' => 'Your password reset',
        'body' => "Hello,<br /><br />In order to reset your password, please follow this link: <br /> <a href=':url' target='_blank'>:url</a><br /><br />Hoping to see you soon,<br />The JustAuthMe team.",
        'action' => 'Reset my password'
    ]
];
