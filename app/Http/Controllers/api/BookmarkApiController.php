<?php

namespace App\Http\Controllers\api;


    use App\Http\Controllers\Controller;
    use App\Models\Bookmark;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


    use Illuminate\Support\Facades\Validator;

    class BookmarkApiController extends Controller
    {
        public function boormark(Request $request)
        {
            $validator = $request->all();
            $inputs = $request->input();

            $validator = Validator::make($request->all(), [
                'chapter_id'     => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response(['status' => 'error', 'message' => $validator->errors()->first()]);
            } else {
                if (empty($inputs['lesson_id'])  &&  empty($inputs['concept_id'])) {
                    return response(['status' => 'error', 'message' => 'plese select any one (lesson_id or concept_id)']);
                } elseif (!empty($inputs['lesson_id'])  &&  !empty($inputs['concept_id'])) {
                    return response(['status' => 'error', 'message' => 'plese select only one (lesson_id or concept_id)']);
                } else {
                    $return_data = Auth::user();
                    if (!empty($inputs['lesson_id'])) {
                        $bookmark_data = Bookmark::where(['user_id' => $return_data->id, 'chapter_id' => $inputs['chapter_id'], 'lesson_id' => $inputs['lesson_id']])->first();
                    } else {
                        $bookmark_data = Bookmark::where(['user_id' => $return_data->id, 'chapter_id' => $inputs['chapter_id'], 'concept_id' => $inputs['concept_id']])->first();
                    }
                    if (empty($bookmark_data)) {
                        $book_mark_info  = new Bookmark;
                        $book_mark_info->user_id    = $return_data->id;
                        $book_mark_info->chapter_id = $inputs['chapter_id'];
                        if (!empty($inputs['lesson_id'])) {
                            $book_mark_info->type = 'lesson';
                            $lesson_id = $book_mark_info->lesson_id  = $inputs['lesson_id'];
                        } else {
                            $book_mark_info->type = 'concept';
                            $concept_id =  $book_mark_info->concept_id = $inputs['concept_id'];
                        }
                        if ($book_mark_info->save()) {
                            return response(['status' => 'success', 'message' => 'Successfully Add  Bookmark']);
                        } else {
                            return response(['status' => 'fail', 'message' => 'Something went wrong']);
                        }
                    } else {
                        $result = Bookmark::where('id', $bookmark_data->id)->delete();
                        if ($result) {
                            return response(['status' => 'success', 'message' => 'Successfully Remove Bookmark']);
                        } else {
                            return response(['status' => 'fail', 'message' => 'Something went wrong']);
                        }
                    }
                }
            }
        }
        public function get_bookmark()
        {
            $user_id = auth('sanctum')->user()->id;
            $bookmark_data = Bookmark::where(['user_id' => $user_id])->with('lesson','concept')->get();
            return response()->json(['status' => 'success', 'message' => 'Bookmark Data', 'bookmark_data' => $bookmark_data]);
        }
    }
