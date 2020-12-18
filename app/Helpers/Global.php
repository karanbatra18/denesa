<?php

use App\User;

/**
 * @param $userId
 * @param $moduleId
 * @return mixed
 */
function getModulePermission($userId, $moduleId)
{
    return \App\SitePermission::where(['user_id' => $userId, 'site_module_id' => $moduleId])->first();
}

if (! function_exists('messageResponse')) {
    function messageResponse($responseType, $alertType, $message)
    {
        return $notification = [
            'success' => $responseType,
            'alert-type' => $alertType,
            'message' => $message,
        ];
    }
}