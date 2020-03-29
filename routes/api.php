<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Covid\Shared\CommandBus;
use Covid\Resources\Domain\Url;
use Covid\Resources\Domain\Title;
use Covid\Resources\Domain\ResourceId;
use Covid\Resources\Domain\Resource;
use Covid\Resources\Domain\Media;
use Covid\Resources\Domain\Description;
use Covid\Resources\Domain\Cost;
use Covid\Resources\Domain\Category;
use Covid\Resources\Domain\Audience;
use Covid\Resources\Application\Query\ResourcesQuery;
use Covid\Resources\Application\Commands\CreateResource;
use Covid\Groups\Domain\GroupId;
use Covid\Groups\Application\Groups;

Route::post('resources', function(Request $request, CommandBus $bus) {
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'url' => 'required',
        'audience' => 'required',
        'category' => 'required',
        'cost' => 'required',
        'media' => 'required',
    ]);
    
    $command = new CreateResource(
        ResourceId::new(),
        new Title($request->get('title')),
        new Description($request->get('description')),
        new Url($request->get('url')),
        new Audience($request->get('audience')),
        new Category($request->get('category')),
        new Cost($request->get('cost')),
        new Media($request->get('media')),
        new DateTimeImmutable()
    );

    $bus->dispatch($command);
});

Route::get('resources', function(ResourcesQuery $resources) {
    return $resources->getResources();
});

Route::get('groups', function(Groups $groups) {
    return $groups->getGroups();
});

Route::get('groups/{groupId}', function($groupId, Groups $groups) {
    return $groups->getGroupById(new GroupId($groupId));
});
