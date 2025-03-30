<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

use App\Controllers\BaseController;
use App\Models\PostsModel;

class Posts extends BaseController
{
    public function index()
    {
        $model = new PostsModel();
        $all_posts = $model
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
        $model = new PostsModel();
        $post = $model
            //->where("published", true)
            ->find($id);
        //$post = $posts->findByIdPublished($id);

        if ($post === null) {
            throw new PageNotFoundException("Post does not exists!");
        }

        return view("Posts/show",  [
            "title" => $post["title"],
            "post" => $post
        ]);
    }


    public function new()
    {
        return view("Posts/new", [
            "title" => "New Post"
        ]);
    }

    public function create()
    {

        $model = new PostsModel();
        $data = [
            "title" => $this->request->getPost("title"),
            "content" => $this->request->getPost("content"),
            "published" => $this->request->getPost("published") !== null ? 1 : 0
        ];

        $id = $model->insert($data);
        if ($id === false) {

            return redirect()->back()
                ->with("errors", $model->errors())
                ->withInput();
        }
        return redirect("Posts::index")->with("message", "Post saved.");
    }


    function edit(int $id)
    {
        $model = new PostsModel();
        $post = $model->find($id);
        if ($post === null) {
            throw new PageNotFoundException("Post not found.");
        }

        return view("Posts/edit", [
            "title" => $post["title"],
            "post" => $post
        ]);
    }


    function update(int $id)
    {
        $model = new PostsModel();
        $data = [
            "title" => $this->request->getPost("title"),
            "content" => $this->request->getPost("content"),
            "published" => $this->request->getPost("published") !== null ? 1 : 0
        ];
        //dd($data);

        $success = $model->update($id, $data);
        if ($success === false) {
            return redirect()->back();
        }

        return redirect("Posts::index")->with("message", "Post #$id updated.");
    }


    function deleteConfirm(int $id)
    {
        $model = new PostsModel();
        $post = $model->find($id);
        if ($post === null) {
            throw new PageNotFoundException("Post not found.");
        }

        return view("Posts/delete_confirm", [
            "title" => $post["title"],
            "post" => $post
        ]);
    }

    function delete(int $id)
    {
        $model = new PostsModel();

        $model->delete($id);
        return redirect("Posts::index")->with("message", "Post #$id deleted.");
    }
}
