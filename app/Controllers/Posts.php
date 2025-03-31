<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;
use App\Models\PostsModel;
use App\Entities\Post;

class Posts extends BaseController
{

    private $model = null;

    function __construct()
    {
        $this->model = new PostsModel();
    }

    public function index()
    {
        $all_posts = $this->model
            //->where("published", 1)
            ->orderBy("id", "desc")
            ->findAll();
        //$all_posts = $posts->findAllPublished();

        // dd($all_posts);

        return view("Posts/index",  [
            "title" => "All Posts",
            "all_posts" => $all_posts
        ]);
    }

    public function show(int $id)
    {
        // $post = $this->model
        //     //->where("published", true)
        //     ->find($id);
        // //$post = $posts->findByIdPublished($id);

        $post = $this->findOr404($id);
        if ($post === null) {
            throw new PageNotFoundException("Post does not exists!");
        }

        return view("Posts/show",  [
            "title" => $post->title,
            "post" => $post
        ]);
    }


    public function new()
    {
        $post = new Post();
        $post->published = "1";
        return view("Posts/new", [
            "title" => "New Post",
            "post" => $post
        ]);
    }

    public function create()
    {
        $post = new Post();
        $post->title = $this->request->getPost("title");
        $post->content = $this->request->getPost("content");
        $post->published = $this->request->getPost("published") !== null ? "1" : "0";

        $id = $this->model->insert($post);
        if ($id === false) {

            return redirect()->back()
                ->with("errors", $this->model->errors())
                ->withInput();
        }
        return redirect("Posts::index")->with("message", "Post saved.");
    }


    function edit(int $id)
    {
        $model = new PostsModel();
        $post = $this->findOr404($id);

        return view("Posts/edit", [
            "title" => $post->title,
            "post" => $post
        ]);
    }


    function update(int $id)
    {
        $model = new PostsModel();
        $post = $this->findOr404($id);
        //$post = new Post();
        $post->title = $this->request->getPost("title");
        $post->content = $this->request->getPost("content");
        $post->published = $this->request->getPost("published") !== null ? "1" : "0";


        if (! $post->hasChanged()) {
            return redirect("Posts::index")->with("message", "Nothing changed.");
        }

        $success = $model->update($id, $post);
        if ($success === false) {
            return redirect()->back()
                ->with("errors", $model->errors())
                ->withInput();
        }

        return redirect("Posts::index")->with("message", "Post #$id updated.");
    }


    function deleteConfirm(int $id)
    {
        $model = new PostsModel();
        $post = $this->findOr404($id);

        return view("Posts/delete_confirm", [
            "title" => $post->title,
            "post" => $post
        ]);
    }

    function delete(int $id)
    {
        $model = new PostsModel();

        $model->delete($id);
        return redirect("Posts::index")->with("message", "Post #$id deleted.");
    }


    // No CRUD -> Helpers

    function findOr404($id)
    {
        $post = $this->model->find($id);
        if ($post === null) {
            throw new PageNotFoundException("Post not found!");
        }
        return $post;
    }
}
