<?php

namespace App\Core\services;

use App\Core\repositories\TagRepository;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagService
{
    private $tags;

    public function __construct(TagRepository $tags)
    {
        $this->tags = $tags;
    }

    public function create(Request $request)
    {
        $tag = Tag::query()->create($request->all());
        $this->tags->save($tag);
        return $tag;
    }

    public function edit($id, Request $request)
    {
        $tag = Tag::query()->find($id)->update($request->all());
        return $tag;
    }

    public function activate($id)
    {
        $tag = $this->tags->getId($id);
        $tag->activate();
        $this->tags->save($tag);
    }

    public function draft($id)
    {
        $tag = $this->tags->getId($id);
        $tag->draft();
        $this->tags->save($tag);
    }

    public function remove($id)
    {
        $tag = $this->tags->getId($id);
        if ($tag->posts->count()) {
            throw new \DomainException('Ошибка, у тега есть статьи');
        }
        $this->tags->remove($tag);
    }
}
