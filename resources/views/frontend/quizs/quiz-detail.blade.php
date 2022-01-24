@extends('layout.layout')
@section('page-title','For student')
@section('main')
    

<main>
    <div class="title mt-4 mb-3">
        <h4>Câu hỏi bộ quiz ôn luyện Java 1-lớp 16304web</h4>

    </div>

    <div class="content-quiz bg-light mb-4">
        <form action='' method="POST">
            @csrf
            <div class="item  p-3 mb-3">
                <div class="ques mb-3 alert alert-secondary">
                    1.Đoạn code nào sau đây sẽ cho ra output 'Hello world!' ?
                </div>
                <div class="list-answer">
                    <p>
                        <input type="radio" id="as1" name="answer" value="">
                        <label for="as1">1.System.out.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as2" name="answer" value="">
                        <label for="as2">2.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as3" name="answer" value="">
                        <label for="as3">3.echo ('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as4" name="answer" value="">
                        <label for="as4">4.alert('Hello world!');</label>
                    </p>
                </div>

            </div>

            <div class="item  p-3 mb-3">
                <div class="ques mb-3 alert alert-secondary">
                    1.Đoạn code nào sau đây sẽ cho ra output 'Hello world!' ?
                </div>
                <div class="list-answer">
                    <p>
                        <input type="radio" id="as1" name="answer" value="">
                        <label for="as1">1.System.out.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as2" name="answer" value="">
                        <label for="as2">2.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as3" name="answer" value="">
                        <label for="as3">3.echo ('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as4" name="answer" value="">
                        <label for="as4">4.alert('Hello world!');</label>
                    </p>
                </div>

            </div>

            <div class="item  p-3 mb-3">
                <div class="ques mb-3 alert alert-secondary">
                    1.Đoạn code nào sau đây sẽ cho ra output 'Hello world!' ?
                </div>
                <div class="list-answer">
                    <p>
                        <input type="radio" id="as1" name="answer" value="">
                        <label for="as1">1.System.out.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as2" name="answer" value="">
                        <label for="as2">2.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as3" name="answer" value="">
                        <label for="as3">3.echo ('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as4" name="answer" value="">
                        <label for="as4">4.alert('Hello world!');</label>
                    </p>
                </div>

            </div>

            <div class="item  p-3 mb-3">
                <div class="ques mb-3 alert alert-secondary">
                    1.Đoạn code nào sau đây sẽ cho ra output 'Hello world!' ?
                </div>
                <div class="list-answer">
                    <p>
                        <input type="radio" id="as1" name="answer" value="">
                        <label for="as1">1.System.out.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as2" name="answer" value="">
                        <label for="as2">2.print('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as3" name="answer" value="">
                        <label for="as3">3.echo ('Hello world!');</label>
                    </p>
                    <p>
                        <input type="radio" id="as4" name="answer" value="">
                        <label for="as4">4.alert('Hello world!');</label>
                    </p>
                </div>

            </div>

            <button type="submit" class="btn btn-info mt-3">Gửi</button>
        </form>
    </div>
</main>
@endsection
