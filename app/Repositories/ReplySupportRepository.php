<?php

namespace App\Repositories;

use App\Models\ReplySupport;
use App\Repositories\Traits\{RepositoryTrait, SupportIdTrait};

class ReplySupportRepository{

    use RepositoryTrait;
    use SupportIdTrait;

    protected $entity;

    public function __construct(ReplySupport $model)
    {
        $this->entity = $model;
    }

    public function createReplyToSupport($supportId, array $data){
        $user = $this->getUserAuth();

        // $support = app(SupportRepository::class)->getSupport($supportId);
        $support = $this->getSupport($supportId);

        return $support
                    ->replies()
                    ->create([
                        'description' => $data['description'],
                        'user_id' => $user->id,
                    ]);
    }

}
