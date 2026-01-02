@extends('admin.admin_dashboard')
@section('admin')

<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary">
        <div class="col-12">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="m-0">Finall Question</h1>

                <a href="{{ route('add.answer') }}">
                    <button style="--clr: #39ff14" class="button-styleee">
                        <span>Add Answer</span><i></i>
                    </button>
                </a>
            </div>

            @php
                $groupedData = $allData->groupBy('category_id');
            @endphp

            <div class="accordion" id="categoryAccordion">

                @foreach ($groupedData as $categoryId => $answers)
                    <div class="accordion-item mb-2">

                        <!-- Category Header -->
                        <h2 class="accordion-header" id="heading{{ $categoryId }}">
                            <button class="accordion-button collapsed bg-dark text-white"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $categoryId }}"
                                aria-expanded="false">

                                {{ $answers->first()->category->uni_name ?? 'N/A' }}
                            </button>
                        </h2>

                        <!-- Questions & Answers -->
                        <div id="collapse{{ $categoryId }}"
                            class="accordion-collapse collapse"
                            data-bs-parent="#categoryAccordion">

                            <div class="accordion-body bg-secondary">

                                <table class="table table-bordered text-white">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Answer 1</th>
                                            <th>Answer 2</th>
                                            <th>Answer 3</th>
                                            <th>Answer 4</th>
                                            <th>Correct</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($answers as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->question }}</td>
                                                <td>{{ $item->question_one }}</td>
                                                <td>{{ $item->question_two }}</td>
                                                <td>{{ $item->question_three }}</td>
                                                <td>{{ $item->question_four }}</td>
                                                <td>
                                                    <span class="badge bg-success">
                                                        {{ $item->correct_answer }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('delete.answer', $item->id) }}"
                                                       class="btn btn-danger btn-sm"
                                                       id="delete">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
</div>

@endsection
