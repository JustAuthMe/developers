<?php
function readable_role($role)
{
    switch ($role) {
        case \App\Organization::ROLE_OWNER:
            return '<span class="text-danger">'.__('dash.organizations.owner').'</span>';
            break;
        case \App\Organization::ROLE_ADMIN:
            return '<span class="text-warning">'.__('dash.organizations.administrator').'</span>';
            break;
        case \App\Organization::ROLE_USER:
            return '<span class="text-dark">'.__('dash.organizations.user').'</span>';
            break;
        default:
            return "Unknown";
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

function get_jam_url($app_id = null, $redirect_url = null)
{
    if (!$app_id) {
        $app_id = env('JAM_APP_ID');
    }
    if (!$redirect_url) {
        $redirect_url = env('JAM_REDIRECT_URL');
    }
    return env('JAM_CORE').'/auth?app_id=' . $app_id . '&redirect_url=' . $redirect_url;
}

function parseMarkdown($markdown)
{
    $parse = new ParsedownExtra();
    return $parse->text($markdown);
}
