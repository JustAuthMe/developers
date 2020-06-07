<?php

return [
    'invitation' => [
        'guest' => [
            'subject' => 'Invitation à rejoindre une organisation',
            'body' => "Bonjour,<br /><br />Vous venez d'être invité à rejoindre l'organisation :name, pour valider votre adhésion, merci de créer un compte sur la plateforme destinée aux développeurs en suivant ce lien :<br /> <a href=':url' target='_blank'>:url</a><br /><br />À bientôt<br />L'équipe de JustAuthMe",
            'action' => 'Créer un compte'
        ]
    ],
    'email_validation' => [
        'subject' => 'Validation de votre adresse e-mail',
        'body' => "Bonjour,<br /><br />Merci de valider votre adresse e-mail en suivant ce lien : <br /> <a href=':url' target='_blank'>:url</a><br /><br />À bientôt<br />L'équipe de JustAuthMe",
        'action' => 'Valider mon e-mail'
    ],
    'password_reset' => [
        'subject' => 'Réinitialisation de votre mot de passe',
        'body' => "Bonjour,<br /><br />Pour réinitialiser votre mot de passe, merci de suivre le lien ci-dessous : <br /> <a href=':url' target='_blank'>:url</a><br /><br />À bientôt<br />L'équipe de JustAuthMe",
        'action' => 'Réinitialiser mon mot de passe'
    ]
];
