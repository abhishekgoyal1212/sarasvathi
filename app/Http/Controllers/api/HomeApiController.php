<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use App\Models\Chapters;
use App\Models\Classes;
use App\Models\Concept;
use App\Models\Dynamic;
use App\Models\Exam;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\CourseTags;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HomeApiController extends Controller
{

    public function homepage()
    {
        $user_id = auth('sanctum')->user()->id;
        $user_data = User::where('id', $user_id)->with('board')->with('class')->first();
        $banner = Dynamic::where('type', 'banner')->first();
        $banner_result =  asset('admin-assets/img/dynamic/' . $banner->image);
        $all_subjects = Subject::where(['class_id' => $user_data->class_id, 'board_id' => $user_data->board_id])->active()->get();
        $trending_chapter = Chapters::where(['class_id' => $user_data->class_id, 'board_id' => $user_data->board_id])->orderBy('trending', 'DESC')->with('subjects')->active()->take(3)->get();
        $last_seen = CourseTags::where('user_id', $user_id)->first();
        if (empty($last_seen)) {
            if (count($trending_chapter) == 0) {
                $recommended_learning = [];
            } else {
                $recommended_learning = Lesson::where('chapter_id', $trending_chapter[0]->id)->active()->get();
            }
            // $recommended_learning = Lesson::where('chapter_id',$trending_chapter[0]->id)->active()->get();

        } else {
            $lesson_data = Lesson::where('id', $last_seen->lesson_id)->active()->first();
            $recommended_learning = Lesson::where('chapter_id', $lesson_data->chapter_id)->active()->get();
        }

        return response()->json(['status' => 'success', 'message' => 'Home Page Data', 'banner_img' => $banner_result,  'all_subjects' => $all_subjects, 'trending_chapter' => $trending_chapter, 'recommended_learning' => $recommended_learning,'board'=>$user_data->board->name,'stream'=>$user_data->stream]);
    }

    // public function homepage()
    // {
    //     $banner = Dynamic::where('type', 'banner')->first();
    //     $banner_result =  asset('admin-assets/img/dynamic/' . $banner->image);

    //     $all_classes = Classes::active()->get();
    //     $all_subjects = Subject::active()->get();
    //     $all_chapters = Chapters::active()->with('subjects')->get();
    //     $all_lessons = Lesson::active()->get();

    //     return response()->json(['status' => 'success', 'message' => 'Home Page Data', 'banner_img' => $banner_result, 'all_classes' => $all_classes, 'all_subjects' => $all_subjects, 'all_chapters' => $all_chapters, 'recommended_lessons' => $all_lessons]);
    // }

    public function logo()
    {
        $result = Dynamic::where('type', 'logo')->first();
        if ($result) {
            $logo_img =  asset('admin-assets/img/dynamic/' . $result->image);
            return response()->json(['status' => 'success', 'message' => 'Logo Data', 'logo_img' => $logo_img, 'title' => $result->heading]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
        }
    }
    public function banner()
    {
        $result = Dynamic::where('type', 'banner')->first();
        if ($result) {
            $banner_img =  asset('admin-assets/img/dynamic/' . $result->image);
            return response()->json(['status' => 'success', 'message' => 'Banner Data', 'banner_img' => $banner_img]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
        }
    }
    public function loginpage()
    {
        $result = Dynamic::where('type', 'loginpage')->first();
        if ($result) {
            $loginpage_img =  asset('admin-assets/img/dynamic/' . $result->image);
            return response()->json(['status' => 'success', 'message' => 'Login Page Data', 'loginpage_img' => $loginpage_img, 'heading' =>  $result->heading, 'content' =>  $result->content]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
        }
    }
    public function trending_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chapter_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $user = Chapters::find($request->chapter_id);
            if (empty($user)) {
                return response()->json(['status' => 'error', 'message' => 'No chapter found']);
            } else {
                $user->trending = ($user->trending) + 1;
                $user->save();
                if ($user) {
                    return response()->json(['status' => 'success', 'message' => 'trending data update successfully']);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
                }
            }
        }
    }
    public function recommended_lesson(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lesson_id' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $user = User::find($request->user_id);
            $lesson = Lesson::find($request->lesson_id);
            if (empty($user) || empty($lesson)) {
                return response()->json(['status' => 'error', 'message' => 'No data found']);
            } else {
                $last_seen = CourseTags::where('user_id', $request->user_id)->first();
                if (empty($last_seen)) {
                    $last_seen = new CourseTags;
                    $last_seen->user_id = $request->user_id;
                    $last_seen->lesson_id = $request->lesson_id;
                    $last_seen->save();
                } else {
                    $last_seen->lesson_id = $request->lesson_id;
                    $last_seen->save();
                }
            }

            if ($last_seen) {
                return response()->json(['status' => 'success', 'message' => 'recommended data update successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong.']);
            }
        }
    }
}
