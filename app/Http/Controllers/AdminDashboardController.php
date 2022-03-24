<?php

namespace App\Http\Controllers;

use App\Models\VacancyCandidate;
use Illuminate\Http\Request;
use DataTables;
class AdminDashboardController extends Controller
{
    //

    public function index(Request $request) {
        // dd($candidates);
        if ($request->ajax() && $request->wantsJson() ) {
            $candidates = VacancyCandidate::withCount(["documents"])->with('posts')->latest()->get();
            return DataTables::of($candidates)
                            ->addColumn('name', function($row) {
                                return ucwords(strtolower($row->first_name)) . " " . ucwords(strtolower($row->last_name));
                            })
                            ->addColumn('email', function ($row) {
                                return $row->email_address;
                            })
                            ->addColumn('post', function ($row) {
                                $posts = "";
                                if ( ! $row->posts ) {
                                    $posts .= "<span class='badge bg-danger'>Not Applied</span>";
                                } else {

                                    foreach ($row->posts as $post) {
                                        $posts .= "<span class='mx-1 px-2 badge bg-primary'>";
                                        $explode = explode('-',$post->post_name);
                                        foreach ($explode as $exp) {
                                            $posts .= ucwords($exp);
                                        }
                                        $posts .= "</span>";
                                    }
                                }

                                return $posts;
                            })
                            ->addColumn('documents', function ($row) {
                                return ($row->documents_count) ? $row->documents_count : 0;
                            })
                            ->addColumn('status', function ($row) {
                                return ucwords($row->status);
                            })
                            ->addColumn('action', function ($row) {
                                $action = "";
                                $action .= "<a href='".route('admin_candidate_detail',$row->id)."' class='text-primary'>";
                                    $action .= "View";
                                $action .= "</a>";

                                $action .= " | <a class='text-danger' onClick='return confirm(\'This action is permanent. You can not undo. Are you sure to continue.\')' href=''>";
                                $action .= "Delete";
                                $action .= "</a>";
                                
                                return $action;
                            })
                            ->rawColumns(["post",'action'])
                            ->make(true);
        }
        return view('admin.dashboard.index');
    }

    public function candidate_detail(VacancyCandidate $candidate) {
        return view('admin.dashboard.detail',compact("candidate"));
    }
}
