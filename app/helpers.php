<?php
function readable_role($role)
{
    switch ($role) {
        case \App\Organization::ROLE_OWNER:
            return '<span class="text-danger">Propriétaire</span>';
            break;
        case \App\Organization::ROLE_ADMIN:
            return '<span class="text-warning">Administrateur</span>';
            break;
        case \App\Organization::ROLE_USER:
            return '<span class="text-dark">Utilisateur</span>';
            break;
        default:
            return "Indéfini";
    }
}

function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}

function get_jam_url(){
    return 'https://core.justauth.me/auth?app_id='.env('JAM_APP_ID').'&redirect_url='.env('JAM_REDIRECT_URL');
}
