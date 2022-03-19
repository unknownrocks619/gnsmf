<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\VacancyCandidate;
use App\Models\VacancyCandidateUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
class VacancyCandidateController extends Controller
{
    //
    protected $v_post = [
        "Cardiologist",
        "Neurologist",
        "Physician",
        "Nephrologists",
        "Ophthalmologist",
        "Anesthesiologist",
        "Consultant Surgeon",
        "Consultant Physician",
        "Child Specialist",
        "ENT Surgeon",
        "Ortho Specialist",
        "Obs. & Gynecologist",
        "Dermatologist",
        "Psychiatrist",
        "Radiologist",
        "Physician",
        "Dietician",
        "Pathologist",
        "Hospital Administrator",
        "Matron",
        "Medical Officer",
        "Physiotherapist",
        "Assistant Matron",
        "Sister",
        "Assistant / Deputy Administrator",
        "Pharmacist",
        "Account/Finance Officer",
        "Medical Technologist",
        "Dental Surgeon",
        "Radiography Technologist",
        "Senior Radiographer",
        "Lab Technician",
        "Staff Nurse",
        "Health Assistant / Senior CMS",
        "Dental Hygienist",
        "Medical Recorder",
        "Accountant",
        "Receptionist",
        "Store Keeper",
        "Pharmacy Assistant",
        "ECG Technician",
        "Audiology Assistant",
        "Speech Therapist",
        "Anesthesia Assistant",
        "ANM",
        "CMA",
        "Lab Assistant",
    ];
    public function create($user) {
        $user = VacancyCandidate::findOrFail(decrypt($user));
        $v_post = $this->v_post;
        return view('online-application.upload-start',compact('user',"v_post"));
    }

    public function store(Request $request) {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required|email",
            "phone" => "required|min:10|numeric"
        ]);

        $candidate = new VacancyCandidate;
        // check if email exists.

        $email_exists = $candidate->where('email_address',filter_var($request->email,FILTER_VALIDATE_EMAIL))->first();

        if ($email_exists) {
            // return redirect to upload.
            return redirect()->route('vacancy_upload',encrypt($email_exists->id));
        }

        $candidate->first_name = filter_var($request->first_name, FILTER_DEFAULT);
        $candidate->last_name = filter_var($request->last_name);
        $candidate->email_address = filter_var($request->email,FILTER_VALIDATE_EMAIL);
        $candidate->phone_number = $request->phone;
        $candidate->status = "pending";

        try {
            $candidate->save();
        } catch (\Throwable $th) {
            //throw $th;
            $request->session()->flash('error',"Unable to create record. Please try again with proper information.");
            return back()->withInput();
        }

        $request->session()->flash('success',"Please Upload File detail according to feilds");
        return redirect()->route('vacancy_upload',encrypt($candidate->id));
    }

    public function upload_store(Request $request,$user) {
        $array_keys = [];
        foreach ($this->v_post as  $values) {
            $array_keys[Str::slug($values,"-")] = $values;
        }
        $request->validate([
            "post" => "required",
            "voucher_number" => "required|unique:vacancy_candidate_uploads,remarks",
            "application_form_file" => "required|mimes:png,jpg|file|max:1024",
            "voucher_file" => "required|mimes:jpg,png|file|max: 1024",
            "education_file" => "required|mimes:pdf|file|max:2048",
            "experience_letter" => "required|mimes:pdf|file|max:2048",
            "citizenship_front_file" => "required|mimes:png,jpg|file|max:1024",
            "citizenship_back_file" => "required|mimes:png,jpg|file|max:1024"
        ]);

        if ( ! array_key_exists($request->post,$array_keys) ) {
            $request->session()->flash("error","Inappropirate value.");
            return back();
        }
        $user = VacancyCandidate::findOrFail(decrypt($user));

        // check if user have already applied for post.
        $check_post_record = Post::where('post_name',$request->post)->where('vacancy_candidate_id',$user->id)->first();

        if ($check_post_record) {
            $request->session()->flash("error","You have already applied for selected post.");
            return back();
        }
        $create_record = [];
        
        $voucher_array = [
            "title" => "voucher-number",
            "vacancy_candidate_id" => $user->id,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            // "remarks" => $request->voucher_number
        ];
        // upload voucher.
        $voucher_file_detail = [
            "original_name" =>$request->file("voucher_file")->getClientOriginalName (),
            'file_type' => $request->file("voucher_file")->getMimeType(),
            'path' =>Storage::putFile('vacancy/voucher',$request->file("voucher_file")->path())
        ];
        $voucher_array["file_detail"] = json_encode($voucher_file_detail);
        // $create_record[] = $voucher_array;

        $application_form = [
            "title" => "application-form",
            "vacancy_candidate_id" => $user->id,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()

        ];
        $application_form_file = [
            "original_name" =>$request->file("application_form_file")->getClientOriginalName (),
            'file_type' => $request->file("application_form_file")->getMimeType(),
            'path' =>Storage::putFile('vacancy/application',$request->file("application_form_file")->path())
        ];
        $application_form["file_detail"] = json_encode($application_form_file);
        $create_record[] = $application_form;


        $education_form = [
            "title" => "education-form",
            "vacancy_candidate_id" => $user->id,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()

        ];
        $education_file = [
            "original_name" =>$request->file("education_file")->getClientOriginalName (),
            'file_type' => $request->file("education_file")->getMimeType(),
            'path' =>Storage::putFile('vacancy/education',$request->file("education_file")->path())
        ];
        $education_form["file_detail"] = json_encode($education_file);
        $create_record[] = $education_form;

        $experience_form = [
            "title" => "experience-form",
            "vacancy_candidate_id" => $user->id,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ];
        $experience_letter = [
            "original_name" =>$request->file("experience_letter")->getClientOriginalName (),
            'file_type' => $request->file("experience_letter")->getMimeType(),
            'path' =>Storage::putFile('vacancy/experience',$request->file("experience_letter")->path())
        ];
        $experience_form['file_detail'] = json_encode($experience_letter); 
        $citizenship_front = [
            "title" => "citizenshp-front",
            "vacancy_candidate_id" => $user->id,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ];
        $citizenship_front_file = [
            "original_name" =>$request->file("citizenship_front_file")->getClientOriginalName (),
            'file_type' => $request->file("citizenship_front_file")->getMimeType(),
            'path' =>Storage::putFile('vacancy/citizenship-front',$request->file("citizenship_front_file")->path())
        ];

        $citizenship_front["file_detail"] = json_encode($citizenship_front_file);

        $create_record[] = $citizenship_front;

        $citizenship_back = [
            "title" => "citizenship-back",
            "vacancy_candidate_id" => $user->id,
            "created_at" => \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now()
        ];
        $citizenship_back_file = [
            "original_name" =>$request->file("citizenship_back_file")->getClientOriginalName (),
            'file_type' => $request->file("citizenship_back_file")->getMimeType(),
            'path' =>Storage::putFile('vacancy/citizenship-back',$request->file("citizenship_back_file")->path())
        ];

        $citizenship_back["file_detail"] = json_encode($citizenship_back_file);
        $create_record[] = $citizenship_back;


        // dd($create_record);
        try {
            DB::transaction(function() use ($create_record,$voucher_array,$request,$user){
                VacancyCandidateUpload::insert($voucher_array);
                VacancyCandidateUpload::insert($create_record);
                $post = new Post;
                $post->post_name = $request->post;
                $post->vacancy_candidate_id = $user->id;
                $post->save();
            });
        } catch (\Throwable $th) {
            //throw $th;
            $request->session()->flash("error","Unable to upload your documents. Try Again.");
            return back();
            // dd($th->getMessage());
        }

        $redirect_url = URL::temporarySignedRoute('vacancy_complete',now()->addMinutes(5),[encrypt($user->id)]);
        return redirect()->to($redirect_url);
    }

    public function complete(Request $request, $user) {
        if (! $request->hasValidSignature()) {
            return redirect()->route('index');
        }
        $user = VacancyCandidate::findOrFail(decrypt($user));
        return view("online-application.complete",compact('user'));
    }
 }
