<?php
namespace Salox\Service\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Salox\Service\Requests\SupportRequest;
use Salox\Service\Repositories\InitRepository;
use Salox\Service\Repositories\SupportRepository;

class SupportController extends Controller
{
    protected $request;
    protected $repo;
    protected $init;

    public function __construct(
        Request $request,
        SupportRepository $repo,
        InitRepository $init
    ) {
        $this->request = $request;
        $this->repo = $repo;
        $this->init = $init;
        $this->middleware('prohibited.test.mode')->only(['submit']);
    }

    public function index()
    {
        return $this->init->product();
    }

    public function submit(SupportRequest $request)
    {
        $this->repo->submit($this->request->all());

        return $this->success(['message' => 'Your support request is submitted.']);
    }
}
