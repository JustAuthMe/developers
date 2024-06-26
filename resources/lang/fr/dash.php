<?php
return [
    'yes' => 'Oui',
    'cancel' => 'Annuler',
    'back-to-landing' => 'Retour',
    'are-you-sure' => 'Etes-vous sûr ?',
    'show' => 'Voir',
    'hide' => 'Cacher',
    'action' => 'Action',
    'edit' => 'Modifier',
    'back' => 'Retour',
    'submit' => 'Envoyer',
    'select-all' => 'Tout séléctionner',
    'contact-support' => 'Contactez le support',
    'oops' => 'Oups...',
    'welcome-message' => 'Bienvenue sur le tableau de bord des développeurs, pour commencer, créez un compte (ou <a href=":url">connectez-vous</a>) !',
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
        'login-with' => 'Connexion avec',
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
        'organization-management' => 'Gestion de l\'organisation',
        'create-an-organization' => 'Créer une organisation',
        'name' => 'Nom',
        'role' => 'Rôle',
        'action' => 'Action',
        'manage' => 'Gérer',
        'invite' => 'Inviter',
        'kick' => 'Retirer',
        'leave' => 'Se retirer',
        'informations' => 'Informations',
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
        'create-wordpress' => 'Installer sur WordPress ou WooCommerce',
        'application-management' => 'Gestion de l\'application',
        'manage' => 'Gérer',
        'name' => 'Nom',
        'url' => 'URL',
        'logo' => 'Logo',
        'redirect-url' => 'URL de redirection',
        'app-id' => 'ID d\'app',
        'secret-key' => 'Clé secrète',
        'dev-mode' => 'Mode développeur',
        'dev-mode-help' => 'Le mode développeur permet d\'autoriser la redirection sur n\'importe quelle adresse IP
                            locale.',
        'dev-mode-warning' => 'Mode à désactiver impérativement en production',
        'renew-key' => 'Renouveler',
        'data' => 'Données',
        'data-help' => 'Naviguez dans les catégories ci-dessous pour séléctionner les données que vous souhaitez récupérer.',
        'owner' => 'Propriétaire',
        'transfer-to-user' => 'Transférer à un utilisateur',
        'transfer-to-organization' => 'Transférer à une organisation',
        'data-label' => 'Donnée',
        'desired' => 'Souhaitée',
        'required' => 'Obligatoire',
        'identity' => 'Identité',
        'email' => 'Adresse e-mail',
        'firstname' => 'Prénom',
        'lastname' => 'Nom',
        'birthdate' => 'Date de naissance',
        'birthlocation' => 'Ville de naissance',
        'avatar' => 'Photo de profil',
        'address' => 'Adresse',
        'address_1' => 'Adresse',
        'address_2' => 'Complément d\'adresse',
        'postal_code' => 'Code postal',
        'city' => 'Ville',
        'state' => 'Région',
        'country' => 'Pays',
        'buisness' => 'Entreprise',
        'job' => 'Emploi',
        'company' => 'Société',
        'other-data' => 'Autres données',
        'alerts' => [
            'redirect-url-invalid' => 'L\'URL de redirection est invalide.',
            'redirect-url-same-base-url' => 'L\'URL de redirection doit être en https et doit être sous la même URL de base.',
            'already-exists' => 'Une application portant ce nom ou ce domaine existe déja.',
            'not-found' => 'L\'application n\'existe pas ou plus.',
            'key-revoked' => 'La clé secrète a bien été revoquée.',
            'user-invited-does-not-exist' => 'Il n\'existe aucun utilisateur avec cette adresse e-mail.',
            'owner-change-ok' => 'Le changement de propriétaire a bien été effectué.',
            'created' => 'L\'application a bien été créée.',
            'updated' => 'L\'application a bien été modifiée.'
        ]
    ],
    'integration' => [
        'its-ready' => 'On y est presque !',
        'thank-phrase' => 'Vous êtes à un clic de pouvoir utiliser JustAuthMe, votre nouveau fournisseur SSO biométrique !',
        'back-to-website' => 'Retour à votre site web',
        'application-integration' => 'Intégration d\'une application',
        'complete-integration' => 'Terminez l\'intégration de votre site web',
        'complete-integration-phrase' => 'Vous souhaitiez intégrer JustAuthMe sur votre site web (<a href=":url" target="_blank">:url</a>) :',
        'continue-here' => 'Continuer',
        'ignore' => 'Ignorer',
        'abort' => 'Abandonner',
        'finish' => 'Terminer la configuration',
        'confirm' => 'Votre site web est déjà configuré',
        'confirm-question' => 'Voulez-vous l\'adapter pour une utilisation avec :platform ?',
        'alerts' => [
            'failed-verification' => 'Nous ne parvenons pas à nous connecter à votre site. Contactez-nous :',
            'already-exists' => 'Ce site web est déjà configuré. Si vous en êtes le propriétaire :',
        ]
    ],
    'documentation' => 'Documentation',
    'alerts' => [
        'default-error' => 'Une erreur inattendue s’est produite.',
        'unauthorized' => 'Vous n\'avez pas l\'autorisation.'
    ]
];
