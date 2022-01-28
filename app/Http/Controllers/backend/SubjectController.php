<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Quiz;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class SubjectController extends Controller
{
    // tạo mới môn học
    public function create(Request $rq)
    {

        if ($rq->isMethod('post')) {
            $rq->validate([
                'name' => 'required|unique:subjects|min:6|max:40',
                'avatar' => 'required|image|mimes:png,jpg,jpeg|max:2040'
            ]);

            // insert + upload
            // $fileName = $rq->file('avatar')->getClientOriginalName();
            $fileName = uniqid() . '-subject' . time() . '.' . $rq->avatar->extension();
            $rq->file('avatar')->move(public_path('uploads'), $fileName);

            $sbj = new Subject();
            $sbj->fill($rq->all());
            $sbj->avatar = $fileName;
            $sbj->author_id = $rq->session()->get('teacher')->id;
            $save = $sbj->save();

            if ($save) {
                return back()->with('msg', 'Tạo thành công 1 môn học mới!');
            } else {
                return back()->with('fail', 'Tạo thất bại, vui lòng thử lại!');
            }
        }

        return view('backend.subjects.create');
    }

    // sửa
    public function edit(Request $rq, $id)
    {
        // get data
        $sbj = Subject::find($id);

        if ($rq->isMethod('post')) {
            $rq->validate([
                'name' => 'required|min:5|max:40'
            ]);

            // edit + upload
            if ($rq->file('avatar')) {
                // xóa ảnh cũ
                $fileUploaded = Subject::select('avatar')
                    ->where('id', $id)->first();
                if (File::exists(public_path('uploads/' . $fileUploaded->avatar))) {
                    unlink(public_path('uploads/' . $fileUploaded->avatar));
                }

                $fileName = uniqid() . '-subject' . time() . '.' . $rq->avatar->extension();
                $rq->file('avatar')->move(public_path('uploads'), $fileName);

            }else{
                $fileName = $rq->input('avatar');
            }

            $model = Subject::find($id);
            $model->fill($rq->all());
            $model->avatar = $fileName;
            $model->author_id = $rq->session()->get('teacher')->id;
            $save = $model->save();

            if ($save) {
                return back()->with('msg', 'Cập nhật thành công 1 môn học!');
            } else {
                return back()->with('fail', 'Cập nhật thất bại, vui lòng thử lại!');
            }
        }

        return view('backend.subjects.edit', compact('sbj'));
    }

    // action remove
    public function remove($id)
    {
        if (Subject::find($id)) {
            // xóa ảnh
            $fileUploaded = Subject::select('avatar')
                ->where('id', $id)->first();

            // nếu có avatar trong db
            if (File::exists(public_path('uploads/' . $fileUploaded->avatar))) {
                unlink(public_path('uploads/' . $fileUploaded->avatar));
            }

            // xóa các bài quiz liên quan
            $listQuiz = DB::table('subjects')
                ->select('quizs.*')
                ->join('quizs', 'quizs.subject_id', '=', 'subjects.id')
                ->where('subjects.id', $id)
                ->get();

            foreach ($listQuiz as $item) {
                DB::table('quizs')->delete($item->id);
            }

            // xóa các thông tin liên quan đến môn học

            // xóa subject
            Subject::destroy($id);

            return back()->with('msg', 'Xóa thành công 1 môn học');
        }
    }

    // list quiz của môn học
    public function listQuiz($id){
        // get data
        // nếu tồn tại sp thì ms get ko thì rd
        if(DB::table('subjects')->where('id',$id)->exists()){
            $myQuiz = DB::table('quizs')->where('subject_id',$id)->get();

            $quizTitle = DB::table('subjects')
                            ->select('name')
                            ->where('id',$id)
                            ->first();

           
            
        }else{
            // ko tồn tại
           return redirect(route('admin.dashboard'))->with('msg','Không tồn tại sản phẩm');
        }

        return view('backend.subjects.list-quiz',compact('myQuiz','quizTitle'));
    }
}
