@extends('layout.layout-admin')

@section('page-title', 'Sửa quiz')
@section('main')
    <main class="col-md-9">

        <h4 class="text-center mt-4">Cập nhật quizs</h4>
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger">{{ session('fail') }}</div>
        @endif
        <a class="btn btn-info" href="{{ route('admin.quiz.list') }}">Danh sách </a>
        <div class="container-fluid">
            <form action="" method="POST" class="">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Tên bộ quiz</label>
                        <input type="text" placeholder="Enter name" name="name" class="form-control"
                            value="{{ old('name', $myQuiz->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Thuộc bộ môn</label>
                        <select name="subject_id" id="" class="form-control">
                            @foreach ($listSubject as $item)
                                @if ($myQuiz->subject_id == $item->id)
                                    <option selected value="{{ $item->id }}">{{ $item['name'] }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item['name'] }}</option>
                                @endif
                            @endforeach
                            <option value="0">Môn khác</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Thời gian làm bài</label>
                        <input type="number" placeholder="Enter minutes" name="duration_minutes" class="form-control"
                            value="{{ old('duration_minutes', $myQuiz->duration_minutes) }}">
                        @error('duration_minutes')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Ngày bắt đầu</label>
                        <input type="datetime-local" name="start_time"
                            value="{{ old('start_time') ?? date('Y-m-d\TH:i', strtotime($myQuiz->start_time)) }}"
                            class="form-control">
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Ngày kết thúc</label>
                        <input type="datetime-local" name="end_time"
                            value="{{ old('end_time') ?? date('Y-m-d\TH:i', strtotime($myQuiz->end_time)) }}"
                            class="form-control">
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Xáo trộn câu hỏi?</label>
                        <br>
                        <input {{ $myQuiz->is_shuffle == 0 ? 'checked' : '' }} type="radio" id="sf1" value="0"
                            name="is_shuffle" checked class=""> <label for="sf1">Không</label>
                        <input type="radio" {{ $myQuiz->is_shuffle == 1 ? 'checked' : '' }} id="sf2" value="1"
                            name="is_shuffle" class=""> <label for="sf2">Có</label>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-7">
                        <label for="">Tình trạng?</label>
                        <br>
                        <input type="radio" id="st1" value="0" name="status" {{ $myQuiz->status == 0 ? 'checked' : '' }}
                            class=""> <label for="st1">Ẩn</label>
                        <input type="radio" id="st2" value="1" {{ $myQuiz->status == 1 ? 'checked' : '' }} name="status"
                            class=""> <label for="st2">Hiện </label>
                    </div>

                    {{-- thêm các trường khác --}}

                    <div class="col-md-5">
                        <button type="submit" class="btn btn-warning mb-4">Cập nhật</button>
                    </div>
                </div>
            </form>

            {{-- list câu hỏi & đáp án --}}

            <div class="content-quiz bg-light mb-4 mt-4">
                <!-- Button to Open the Modal -->
                <button type="button" id="openAddQuestionModal" class="btn btn-success">Thêm câu hỏi +</button>

                <!-- Modal -->
                <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tạo câu hỏi mới</h5>
                                <button type="button" class="btn-close btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">close</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('admin.quiz.add-question',['id'=>$myQuiz->id])}}" method="post" id="formAddQues">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="">Nội dung câu hỏi?</label>
                                                <textarea name="name" id="ques_name" class="form-control" rows="2"></textarea>
                                                <div class="er text-danger"></div>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="img" id="">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            
                                            <table>
                                                <thead>
                                                    <th style="width: 88%;">Thêm đáp án</th>
                                                    {{-- <th>Đáp án đúng</th> --}}
                                                </thead>
                                                <tbody id="answer_list">
                                                    <tr>
                                                        <td style="width: 88%;">
                                                            <input type="text" class="form-control" name="answer[]" placeholder="Nhập câu trả lời ">
                                                        </td>
                                                        <td>
                                                            <input class="form-control"
                                                                onchange="correctAnswerChange(this)" name="is_correct" type="checkbox"
                                                                value="0" checked id="status">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 88%;">
                                                            <input type="text" class="form-control" name="answer[]" placeholder="Nhập câu trả lời ">
                                                        </td>
                                                        <td>
                                                            <input class="form-control"
                                                                onchange="correctAnswerChange(this)" name="is_correct" type="checkbox"
                                                                value="1"  id="status">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 88%;">
                                                            <input type="text" class="form-control" name="answer[]" placeholder="Nhập câu trả lời ">
                                                        </td>
                                                        <td>
                                                            <input class="form-control"
                                                                onchange="correctAnswerChange(this)" name="is_correct" type="checkbox"
                                                                value="2"  id="status">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 88%;">
                                                            <input type="text" class="form-control" name="answer[]" placeholder="Nhập câu trả lời ">
                                                        </td>
                                                        <td>
                                                            <input class="form-control"
                                                                onchange="correctAnswerChange(this)" name="is_correct" type="checkbox"
                                                                value="3"  id="status">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$myQuiz->id}}" id="quiz_id">
                                    <input type="hidden" value="" id="correct_order">
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="btnSaveModel" class="btn btn-primary">Lưu lại</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

                {{-- lặp toàn bộ câu hỏi, lồng bên trong là đáp án ok --}}
                @foreach ($listQues as $key => $q)
                    <div class="item  p-3 mb-3">
                        <div class="ques mb-3 alert alert-secondary d-flex justify-content-between">
                            <span> {{ $key + 1 }}.{{ $q->name }} ?</span>
                            <a href="{{ route('admin.quiz.remove-question', ['id' => $q->id]) }}"
                                class="btn btn-danger">Xóa</a>
                        </div>
                        @if ($q->img)
                            <div class="mt-2 mb-3">
                                <img src="{{ asset('uploads/' . $q->img) }}" width="100px" alt="">
                            </div>
                        @endif
                        <div class="list-answer pl-3 pr-3">
                            @foreach (getAnswer($q->id) as $key2 => $a)
                                <p>
                                    <label for="">{{ $key + 1 }}.{{ $key2 + 1 }}.
                                        {{ $a->content }};</label>
                                    <a href="{{ route('admin.quiz.remove-answer', ['id' => $a->id]) }}"
                                        class="ml-4">
                                        <i class="fa fa-trash-o text-danger" aria-hidden="true"></i>
                                    </a>
                                    @if ($a->is_correct == 1)
                                        
                                        {{-- check đáp án đúng --}}
                                        <span class="ml-4 bg-success text-light">Đáp án đúng</span>
                                    @endif
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    {{-- js --}}
    <script>
            // handle thêm câu hỏi
            let options = {
                keyboard: true
            };
            var addQuestionModel = new bootstrap.Modal(document.getElementById('addQuestionModal'), options)
            $("#openAddQuestionModal").click(function() {
                addQuestionModel.show();
            });

            function correctAnswerChange(el) {
                $('tbody#answer_list').find('input[type="checkbox"]').prop('checked', false);
                $(el).prop('checked', true);
                // lấy danh sách tất cả các thẻ input:checkbox trong table
                var listCheckbox = $('tbody#answer_list').find('input[type="checkbox"]');
                $(listCheckbox).each(function(index, el) {
                    if ($(el).is(':checked')) {
                        $('#correct_order').val(index);
                    }
                })
            }

        // submit btnSaveModel
        $('#formAddQues').submit(function(e){
            e.preventDefault();
            

            $flag = true;
            if($('#ques_name').val() == ''){
                $('.er').html('Không được để trống câu hỏi!');
                return $flag;        
            }else{
                $('#formAddQues').submit();
            }

            

        });
    </script>
@endsection
