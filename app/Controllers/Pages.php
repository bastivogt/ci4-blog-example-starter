<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $tables = $db->listTables();
        return view("Pages/index", [
            "title" => "Home"
        ]);
    }

    public function show(string $page)
    {
        if (! is_file(APPPATH . "Views/Pages/$page.php")) {
            throw new PageNotFoundException("Page not found");
        }
        return view("Pages/$page", [
            "title" => ucfirst($page)
        ]);
    }
}
