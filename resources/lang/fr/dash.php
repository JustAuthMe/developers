<?php
return [
    'are-you-sure' => 'Etes-vous sûr ?',
    'see' => 'Voir',
    'action' => 'Action',
    'edit' => 'Modifier',
    'back' => 'Retour',
    'submit' => 'Envoyer',
    'home' => [
        'home' => 'Accueil',
        'welcome-message' => 'Bienvenue sur la plateforme dédiée aux développeurs, vous pouvez ici générer des identifiants pour intégrer JustAuthMe sur vos applications.',
        'create-an-app' => 'Créer une application'
    ],
    'user' => [
        'user' => 'Utilisateur',
        'profile' => 'Profil',
        'email' => 'Adresse e-mail',
        'firstname' => 'Prénom',
        'lastname' => 'Nom',
        'password' => 'Mot de passe',
        'password-confirmation' => 'Confirmation du mot de passe',
        'login' => 'Connexion',
        'logout' => 'Déconnexion',
        'register' => 'Inscription',
        'terms-register' => 'En vous inscrivant, vous acceptez les <a href=":url">conditions générales d\'utilisation</a>.',
        'password-lost' => 'Mot de passe oublié ?',
        'remember-me' => 'Se souvenir de moi',
        'reset-password' => 'Réinitialiser votre mot de passe',
        'login-with-jam' => 'Connexion avec JustAuthMe',
        'jam-reason' => 'Vous ne voulez plus utiliser de mot de passe ?',
        'jam-link' => 'Lier votre compte JustAuthMe',
        'jam-linked' => 'Votre compte est lié à JustAuthMe.',
        'alerts' => [
            'profile-updated' => 'Votre profil a bien été modifié.'
        ]
    ],
    'organizations' => [
        'organization' => 'Organisation',
        'organizations' => 'Organisations',
        'create-an-organization' => 'Créer une organisation',
        'name' => 'Nom',
        'role' => 'Rôle',
        'action' => 'Action',
        'manage' => 'Gérer',
        'invite' => 'Inviter',
        'kick' => 'Retirer',
        'leave' => 'Se retirer',
        'general-settings' => 'Paramètres généraux',
        'invite-user' => 'Inviter un nouvel utilisateur',
        'owner' => 'Propriétaire',
        'administrator' => 'Administrateur',
        'user' => 'Utilisateur',
        'promote' => 'Promouvoir',
        'dismiss' => 'Destituer',
        'alerts' => [
            'created' => 'L\'organisation a bien été créée.',
            'updated' => 'L\'organisation a bien été modifiée.',
            'invited' => 'L\'utilisateur a bien été invité.',
            'role-updated' => 'Le rôle de l\'utilisateur a bien été modifié.',
            'kicked' => 'L\'utilisateur a bien été retiré.',
            'user_already_member' => 'Cet utilisateur est déja membre de l\'organisation.'
        ]
    ],
    'apps' =>[
        'apps' => 'Applications',
        'create-an-app' => 'Créer une application',
        'edit-an-app' => 'Modifier une application',
        'name' => 'Nom',
        'domain' => 'Domaine',
        'logo' => 'Logo',
        'redirect-url' => 'URL de redirection',
        'app-id' => 'ID d\'app',
        'secret-key' => 'Clé secrète',
        'dev-mode' => 'Mode développeur',
        'dev-mode-help' => 'Le mode développeur permet d\'autoriser la redirection sur n\'importe quelle adresse IP
                            locale.',
        'revoke' => 'Révoquer',
        'data' => 'Données',
        'owner' => 'Propriétaire',
        'transfer-to-user' => 'Transférer à un utilisateur',
        'data-label' => 'Donnée',
        'desired' => 'Souhaitée',
        'required' => 'Obligatoire',
        'email' => 'Adresse e-mail',
        'firstname' => 'Prénom',
        'lastname' => 'Nom',
        'birthdate' => 'Date de naissance',
        'avatar' => 'Photo de profil',
        'alerts' => [
            'redirect-url-invalid' => 'L\'URL de redirection est invalide.',
            'redirect-url-does-not-match' => 'L\'URL de redirection doit être en https et doit être sous le même domaine.',
            'already-exists' => 'Une application portant ce nom ou ce domaine existe déja.',
            'not-found' => 'L\'application n\'existe pas ou plus.',
            'key-revoked' => 'La clé secrète a bien été revoquée.',
            'user-invited-does-not-exist' => 'Il n\'existe aucun utilisateur avec cette adresse e-mail.',
            'owner-change-ok' => 'Le changement de propriétaire a bien été effectué.',
            'created' => 'L\'application a bien été créée.',
            'updated' => 'L\'application a bien été modifiée.'
        ]
    ],
    'documentation' => 'Documentation',
    'alerts' => [
        'default-error' => 'Une erreur inattendue s’est produite.',
        'unauthorized' => 'Vous n\'avez pas l\'autorisation.'
    ]
];
