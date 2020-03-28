<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Covid\Groups\Domain\GroupId;
use Covid\Groups\Application\Groups;

Route::get('groups', function(Groups $groups) {
    return $groups->getGroups();
});

Route::get('groups/{groupId}', function($groupId, Groups $groups) {
    return $groups->getGroupById(new GroupId($groupId));
});
