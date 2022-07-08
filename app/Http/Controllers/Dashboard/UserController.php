<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UserDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Users\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\Dashboard
 */
class UserController extends Controller
{
    /**
     * @param UserDatatable $datatable
     * @return mixed
     */
    public function index(UserDatatable $datatable)
    {
        return $datatable->render('dashboard.users.index');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        User::create($request->validated());

        flash(__('users.messages.created'))->success();

        return redirect()->route('dashboard.users.index');
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        flash(__('users.messages.updated'))->success();

        return redirect()->route('dashboard.users.index');
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash(__('users.messages.deleted'))->success();

        return redirect()->route('dashboard.users.index');
    }
}
