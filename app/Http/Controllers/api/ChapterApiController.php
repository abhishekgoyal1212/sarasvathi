<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Chapters;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Section;
use App\Models\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterApiController extends Controller
{

    public function chapters(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $subject = Subject::find($request->subject_id);
            $chapters = Chapters::where('subject_id', $request->subject_id)->get();
            $subject['chapters_count'] = count($chapters);
            return response()->json(['status' => 'success', 'message' => 'All Chatper', 'subject_details' => $subject, 'chapters' => $chapters]);
        }
    }
    public function single_chapter_page(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chapter_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $user = Chapters::find($request->chapter_id);
            $user->trending = ($user->trending) + 1;
            $user->save();


            $quick = Exercise::active()->get();
            $chapter = Chapters::find($request->chapter_id);
            $lessons = Lesson::where('chapter_id', $request->chapter_id)->get();
            return response()->json(['status' => 'success', 'message' => 'Single Chapter Page', 'chapter_info' => $chapter, 'video_lessons' => $lessons, 'quick' => $quick]);
        }
    }
    public function section_page(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chapter_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $chapter = Chapters::find($request->chapter_id);
            $section = Section::where('chapter_id', $request->chapter_id)->with('lessons')->get();
            $concept = Concept::where('chapter_id', $request->chapter_id)->get();
            return response()->json(['status' => 'success', 'message' => 'Chapter Section Page', 'chapter_info' => $chapter, 'chapter_section' => $section, 'chapter_concept' => $concept]);
        }
    }
    public function video_page(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lesson_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => 'All field are required']);
        } else {
            $play_lessons = Lesson::where('id', $request->lesson_id)->first();
            if (!empty($play_lessons)) {
                // pre($play_lessons);
                $related_lesson = Lesson::where('chapter_id', $play_lessons->chapter_id)->get();
                return response()->json(['status' => 'success', 'message' => 'Video Page', 'play_lessons' => $play_lessons, 'related_lesson' => $related_lesson]);
            } else {
                return response(['status' => 'error', 'message' => 'No Lesson Found']);
            }
        }
    }
}
