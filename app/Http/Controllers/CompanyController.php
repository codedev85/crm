<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Company;
use Auth;
use Illuminate\Support\Facades\Validator;

class CompanyController extends AppBaseController
{
    /** @var CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $companies = $this->companyRepository->paginate(1);
        // $companies = Company::orderBy('created_at', 'DESC')->paginate(10);

        return view('companies.index')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        if ($request->hasFile('logo_path')) {
            //getfile name with extenssion
            $filenameWithExt = $request->file('logo_path')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('logo_path')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload images
            $path = $request->file('logo_path')->storeAs('public/logo', $filenameToStore);
        } else {
            //filename to store
            $filenameToStore = 'noimage.jpg';
        }

        //check later for uploads
        //     $width = 50;
        //     $height = 50;

        //     // here $path is set to "clients/logos/FWGXEf9AJ0NOspFoxelTtGUqmr0YP4ztUMUcqkXc.png"
        //     $path = $request->file('logo_path')->store('/logo', 'public');

        //     // creating a canvas
        //     $canvas = Image::canvas($width, $height);

        //     // pass the right full path to the file. Remember that $path is a path inside app/public !
        //     $image = Image::make(storage_path('app/public/'.$path))->resize($width, $height,
        // function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        //     $canvas->insert($image, 'center');

        // pass the full path. Canvas overwrites initial image with a logo
        // $canvas->save(storage_path('app/public/'.$path.'.png'));

        $company = new Company();
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->email = $request->input('email');
        $company->user_id = Auth::user()->id;
        $company->email = $request->input('email');
        $company->logo_path = $filenameToStore;
        $company->save();
        Flash::success('Company saved successfully.');

        return redirect(route('companies.index'));

        // return redirect('/company')->with('success', 'Post created successfully');
        //original code
        // $input = $request->all();
        // //check if the request file conatins the image
        // if ($input['logo_path']) {
        //     //save the image in public directory

        //     //directory path
        //     $imageName = $input['logo_path'];

        //     //public path
        //     $path = public_path('logo/'.$imageName);
        //     //dd($path);
        // }
        //validatin miage size
        //check later

        //$store = $request->file->store('public/'. $imageName);

        // $company = $this->companyRepository->create($input);

        // //$request->logo_path->move(public_path('logo'), $imageName);

        // Flash::success('Company saved successfully.');

        // return redirect(route('companies.index'));
    }

    public function uploadgetimage(Request $request)
    {
        // $company = $this->companyRepository->findWithoutFail($id);
        // dd($company);
        //$company = Company::where('id', $id)->first();
        // dd($company);

        return view('companies.uploadimage');
    }

    public function uploadimage(Request $request, Company $company_id)
    {
        // dd($company);
        // dd($request);
        // $companyAll = Company::all();
        // dd($companyAll);

        // $company = Company::where('id', Auth::user()->company_id)->first();
        // dd($company);

        $file = $request->file('logo_path');
        if ($request->hasFile('logo_path')) {
            //getfile name with extenssion
            $filenameWithExt = $request->file('logo_path')->getClientOriginalName();

            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('logo_path')->getClientOriginalExtension();
            //validat the file size
            $rules = [
                'logo_path' => 'max:2048',
               ];

            $messages = [
                'max' => 'You exceeded the file size ',
                ];
            $validator = Validator::make($request->all(), $rules, $messages);

            //filename to store
            if ($validator) {
                $company = Company::all();
                // dd($company);
                $doescompanyupdate = Company::where('id', Auth::user()->company_id)->update([
                    'logo_path' => $filename.'_'.time().'.'.$extension,
                ]);
            // dd($doescompanyupdate);
            } else {
                return $messages;
                // dd($message);

                //$filenameToStore = $filename.'_'.time().'.'.$extension;
                //upload images
            }
            $path = $request->file('logo_path')->storeAs('public/logo', $filename.'_'.time().'.'.$extension, ['disk' => 'public']);

            //dd($path);
            Flash::success('Image Updated successfully.');

            return redirect(route('companies.index'));

        //return view('companies.show')->with('company', $company);
        } else {
            //filename to store
            $filenameToStore = 'noimage.jpg';
        }
    }

    /**
     * Display the specified Company.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param int                  $id
     * @param UpdateCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompanyRequest $request)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $company = $this->companyRepository->update($request->all(), $id);

        Flash::success('Company updated successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $this->companyRepository->delete($id);

        Flash::success('Company deleted successfully.');

        return redirect(route('companies.index'));
    }
}
