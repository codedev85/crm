<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\user;
use App\Models\Role;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role_id == 1) {
            $this->userRepository->pushCriteria(new RequestCriteria($request));

            $users = $this->userRepository->paginate(1);

            return view('users.index')
            ->with('users', $users);
        }

        //$user = User::where('id', Auth::user()->id);

        // return view('users.index')
        //     ->with('user', $user);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->role_id == 1) {
            $roles = Role::all();
            $companies = Company::all();
            $users = User::all();

            return view('users.create')
            ->with('companies', $companies)
            ->with('users', $users)
            ->with('roles', $roles);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        // $input = $request->input('name');
        // $input = $request->input('first_name');
        // $input = $request->input('last_name');
        // $input = $request->input('email');
        // $input = $request->input('name');

        /* generate a random password and store */
        /* send and email with the generated password*/
        // $characters = 'abscdefghijklmnopqrstwxyz';
        // $charactersLength = strlen($characters);
        // $randomString = '';
        // dd(rand(0, $charactersLength - 1));
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // store the shuffle string in a varaible
        //and add it to the file to bestorein the database
        $shufflepassword = substr(str_shuffle($permitted_chars), 0, 4);
        $inputname = $request->input('name');

        $inputfirst_name = $request->input('first_name');
        $inputlast_name = $request->input('last_name');
        $inputemail = $request->input('email');
        $input_password = $shufflepassword;
        // dd($input_password);
        //grab the user password and send it to the users mail
        $input['password'] = $request->input($shufflepassword);
        // $user = $this->userRepository->create([
        //    $inputname,
        //     $inputfirst_name,
        //     $inputlast_name,
        //     $inputemail,
        //     $input_password,
        // ]);
        $user = User::create([
            'name' => $inputname,
            'first_name' => $inputfirst_name,
            'last_name' => $inputlast_name,
            'email' => $inputemail,
            'password' => Hash::make($input_password),
            ]);
        // dd($user);
        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $roles = Role::all();
        $companies = Company::all();

        return view('users.edit')
        ->with('companies', $companies)
        ->with('roles', $roles)
        ->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int               $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $input = $request->all();
        // dd($input);
        if (!empty($input['password']) || !empty($input['role_id']) || !empty($input['company_id'])) {
            $input['password'] = Hash::make($input['password']);
            $input['role_id'] = $request->input('role_id');
            $input['company_id'] = $request->input('company_id');
        }
        // if (!empty($input['role_id'])) {
        //     $input['role_id'] = $request->input('role_id');
        // }
        // if (!empty($input['company_id'])) {
        //     $input['company_id'] = $request->input('company_id');
        // }
        $user = $this->userRepository->update($input, $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /* show a password update page */
    public function updatepassword()
    {
        return view('users.updatepassword');
    }

    public function updatedpassword(Request $request)
    {
        $input = $request->all();
        // $inputp = Hash::make($input['password']);
        // dd($inputp);
        $user = User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($input['password']),
        ]);
        // dd($user);
        Flash::success('Password updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
