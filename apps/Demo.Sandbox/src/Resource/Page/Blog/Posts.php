<?php

namespace Demo\Sandbox\Resource\Page\Blog;

use BEAR\Resource\ResourceInterface;
use BEAR\Resource\ResourceObject as Page;
use BEAR\Sunday\Inject\ResourceInject;
use BEAR\Sunday\Annotation;
use Ray\Di\Di\PostConstruct;
use Ray\Di\Di\Inject;


/**
 * Blog index page
 *
 * Blog entries listed with edit/delete button
 */
class Posts extends Page
{
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    protected $resource;

    /**
     * @var ResourceObject
     */
    protected $posts;

    /**
     * @param ResourceInterface $resource
     *
     * @Inject
     */
    public function __construct(ResourceInterface $resource)
    {
        $this->resource = $resource;
        $this['posts'] = $this->resource
            ->get
            ->uri('app://self/blog/posts')
            ->request();
        $this->posts = $this->resource->newInstance('app://self/blog/posts');
    }

    public function onGet()
    {
        return $this;
    }

    /**
     * @param int $id
     */
    public function onDelete($id)
    {
        // delete
        $this->resource
            ->delete
            ->object($this->posts)
            ->withQuery(['id' => $id])
            ->eager
            ->request();

        // redirect
        $this->headers['location'] = '/blog/posts';

        return $this;
    }
}
