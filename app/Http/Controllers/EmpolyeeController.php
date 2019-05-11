<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpolyeeRequest;
use App\Http\Requests\UpdateEmpolyeeRequest;
use App\Repositories\EmpolyeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EmpolyeeController extends AppBaseController
{
    /** @var  EmpolyeeRepository */
    private $empolyeeRepository;

    public function __construct(EmpolyeeRepository $empolyeeRepo)
    {
        $this->empolyeeRepository = $empolyeeRepo;
    }

    /**
     * Display a listing of the Empolyee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empolyeeRepository->pushCriteria(new RequestCriteria($request));
        $empolyees = $this->empolyeeRepository->all();

        return view('empolyees.index')
            ->with('empolyees', $empolyees);
    }

    /**
     * Show the form for creating a new Empolyee.
     *
     * @return Response
     */
    public function create()
    {
        return view('empolyees.create');
    }

    /**
     * Store a newly created Empolyee in storage.
     *
     * @param CreateEmpolyeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmpolyeeRequest $request)
    {
        $input = $request->all();

        $empolyee = $this->empolyeeRepository->create($input);

        Flash::success('Empolyee saved successfully.');

        return redirect(route('empolyees.index'));
    }

    /**
     * Display the specified Empolyee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empolyee = $this->empolyeeRepository->findWithoutFail($id);

        if (empty($empolyee)) {
            Flash::error('Empolyee not found');

            return redirect(route('empolyees.index'));
        }

        return view('empolyees.show')->with('empolyee', $empolyee);
    }

    /**
     * Show the form for editing the specified Empolyee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empolyee = $this->empolyeeRepository->findWithoutFail($id);

        if (empty($empolyee)) {
            Flash::error('Empolyee not found');

            return redirect(route('empolyees.index'));
        }

        return view('empolyees.edit')->with('empolyee', $empolyee);
    }

    /**
     * Update the specified Empolyee in storage.
     *
     * @param  int              $id
     * @param UpdateEmpolyeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmpolyeeRequest $request)
    {
        $empolyee = $this->empolyeeRepository->findWithoutFail($id);

        if (empty($empolyee)) {
            Flash::error('Empolyee not found');

            return redirect(route('empolyees.index'));
        }

        $empolyee = $this->empolyeeRepository->update($request->all(), $id);

        Flash::success('Empolyee updated successfully.');

        return redirect(route('empolyees.index'));
    }

    /**
     * Remove the specified Empolyee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empolyee = $this->empolyeeRepository->findWithoutFail($id);

        if (empty($empolyee)) {
            Flash::error('Empolyee not found');

            return redirect(route('empolyees.index'));
        }

        $this->empolyeeRepository->delete($id);

        Flash::success('Empolyee deleted successfully.');

        return redirect(route('empolyees.index'));
    }
}
