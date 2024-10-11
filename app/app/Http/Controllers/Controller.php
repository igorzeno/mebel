<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $repo;

    public function __construct(IBaseRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return $this->repo->all();
    }

    public function store(Request $request)
    {
        return $this->repo->create($request->all());
    }

    public function show(int $id)
    {
        return $this->repo->find($id);
    }

    public function update(Request $request, int $id)
    {
        if($this->repo->update($request->all(), $id))
            return 'OKI';
        else
            return 'Err';
    }

    public function destroy(int $id)
    {
        if($this->repo->destroy($id))
            return 'OK delete';
        else
            return 'Err no';
    }
}
