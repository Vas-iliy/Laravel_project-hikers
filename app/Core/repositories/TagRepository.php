<?php

namespace App\Core\repositories;

use App\Models\Tag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TagRepository
{
    public function getId($id)
    {
        if (!$tag = Tag::query()->where('id', $id)->first()) {
            throw new NotFoundHttpException('tag is not found');
        }
        return $tag;
    }

    public function getSlug($slug)
    {
        if (!$tag = Tag::query()->where('slug', $slug)->where('status', Tag::STATUS_ACTIVE)->first()) {
            throw new NotFoundHttpException('tag is not found');
        }
        return $tag;
    }

    public function getAll()
    {
        return Tag::query()->orderBy('created_at', 'desc')->paginate(env('PAGINATE'));
    }

    public function getAllPlug()
    {
        return Tag::query()->where('status', Tag::STATUS_ACTIVE)->pluck('title', 'id')->all();
    }

    public function remove($tag)
    {
        $tag->status = $tag::STATUS_DELETED;
        if (!$tag->save()) throw new \RuntimeException('Removing tag error.');
    }

    public function save($tag)
    {
        if (!$return = $tag->save()) throw new \RuntimeException('Saving tag error.');
        return $return;
    }
}
