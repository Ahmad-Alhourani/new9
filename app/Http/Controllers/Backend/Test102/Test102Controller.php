<?php

namespace App\Http\Controllers\Backend\Test102;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Test102\CreateTest102;
use App\Http\Requests\Backend\Test102\UpdateTest102;
use App\Repositories\Backend\Test102Repository;
use App\Events\Backend\Test102\Test102Created;
use App\Events\Backend\Test102\Test102Updated;
use App\Events\Backend\Test102\Test102Deleted;
use Prettus\Repository\Criteria\RequestCriteria;
//use XLabTechs\AdminListing\Facades\AdminListing;
use App\Models\Test102;

class Test102Controller extends Controller
{
    /** @var test102Repository */
    private $test102Repository;

    public function __construct(Test102Repository $test102Repo)
    {
        $this->test102Repository = $test102Repo;
    }

    /**
     * Display a listing of the Test102.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     */

    public function index(Request $request)
    {
        $this->test102Repository->pushCriteria(new RequestCriteria($request));
        $data = $this->test102Repository->paginate(25);

        return view('backend.test102s.index')->with('test102s', $data);
    }

    /**
     * Show the form for creating a new Test102.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        return view('backend.test102s.create');
    }

    /**
     * Store a newly created Test102 in storage.
     *
     * @param CreateTest102Request $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateTest102 $request)
    {
        $obj = $this->test102Repository->create(
            $request->only(["name", "status"])
        );

        event(new Test102Created($obj));
        return redirect()
            ->route('admin.test102.index')
            ->withFlashSuccess(__('alerts.frontend.test102.saved'));
    }

    /**
     * Display the specified Test102.
     *
     * @param Test102 $test102
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Test102 $test102)
    {
        return view('backend.test102s.show')->with('test102', $test102);
    }

    /**
     * Show the form for editing the specified Test102.
     *
     * @param Test102 $test102
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Test102 $test102)
    {
        return view('backend.test102s.edit')->with('test102', $test102);
    }

    /**
     * Update the specified Test102 in storage.
     *
     * @param UpdateTest102Request $request
     *
     * @param Test102 $test102
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     */
    public function update(UpdateTest102 $request, Test102 $test102)
    {
        $obj = $this->test102Repository->update($test102, $request->all());

        event(new Test102Updated($obj));
        return redirect()
            ->route('admin.test102.index')
            ->withFlashSuccess(__('alerts.frontend.test102.updated'));
    }

    /**
     * Remove the specified Test102 from storage.
     *
     * @param Test102 $test102
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Test102 $test102)
    {
        $obj = $this->test102Repository->delete($test102);
        event(new Test102Deleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.test102.deleted'));
    }
}
