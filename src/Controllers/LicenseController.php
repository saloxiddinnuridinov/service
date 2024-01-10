<?php
namespace Salox\Service\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Salox\Service\Requests\LicenseRequest;
use Salox\Service\Repositories\LicenseRepository;

class LicenseController extends Controller
{
    protected $request;
    protected $repo;

    public function __construct(
        Request $request,
        LicenseRepository $repo
    ) {
        $this->request = $request;
        $this->repo = $repo;
    }

    public function verify(LicenseRequest $request)
    {
        $this->repo->verify($this->request->all());

        return $this->success(['message' => trans('install.verified')]);
    }
}
