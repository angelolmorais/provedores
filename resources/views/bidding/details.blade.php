@extends('layout')

@section('content')

@php
    use Illuminate\Support\Carbon;

    $userParticipating = App\Models\Register::where('id_user', auth()->user()->id)
                        ->where('id_bidding', $bidding['id'])
                        ->exists();

    $createdAt = session('createdAt');

    $currentDate = Carbon::now()->format('Y-m-d');
    $endDate = date('Y-m-d', strtotime($bidding['ends']))


@endphp
<main class="login-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-times"></i>
                        </button>
                       {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="fa fa-times"></i>
                        </button>
                       {{ session('error') }}
                    </div>
                @endif

            </div>
            <div class="col-md-8">
                <h4 class="mb-4">@lang('messages.bidding_details')</h4>
                <div class="bid-details">
                    <div class="bidding-info">
                        <p><strong>@lang('messages.reference'):</strong> {{ $bidding['reference'] }}</p>
                        <p><strong>@lang('messages.title'):</strong> {{ $bidding['title'] }}</p>
                        <p><strong>@lang('messages.abstract'):</strong> {{ $bidding['abstract'] }}</p>
                        <p><strong>@lang('messages.body'):</strong> {{ $bidding['body'] }}</p>
                        <p><strong>@lang('messages.procedure_kind'):</strong> {{ $bidding['procedure_kind'] }}</p>
                        <p><strong>@lang('messages.oei_procedure'):</strong> {{ $bidding['oei_procedure'] ? __('messages.yes') : __('messages.no') }}</p>
                        <p><strong>@lang('messages.contact_email'):</strong> {{ $bidding['contact_email'] }}</p>
                        <p><strong>@lang('messages.status_code'):</strong> {{ $bidding['status_code'] }}</p>
                        <p><strong>@lang('messages.section_code'):</strong> {{ $bidding['section_code'] }}</p>
                        <p><strong>@lang('messages.starts'):</strong> {{ date('d/m/Y', strtotime($bidding['starts'])) }}</p>
                        <p><strong>@lang('messages.ends'):</strong> {{ date('d/m/Y', strtotime($bidding['ends'])) }}</p>

                    </div>

                   @if (!empty($linkDetails))
                        <div class="link-section">
                            <h4 class="mb-4">@lang('messages.links')</h4>
                            <ul>
                                @foreach ($linkDetails as $linkId => $linkData)
                                    <li>
                                        <a href="{{ $linkData['url'] }}" target="_blank">{{ $linkData['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                 <div class="sidebar-module sidebar-module-inset text-right">
                    <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#modalQuestion" data-whatever="@mdo">@lang('messages.send_inquiry')</button>
                </div>
                <br>
<!--
{{strtotime($endDate)}}<br>
{{strtotime(date('Y-m-d'))}}<br>

{{($endDate)}}<br>
{{(date('Y-m-d'))}}

@if (strtotime($endDate) < strtotime(date('Y-m-d')))
    echo '<br> $endDate for anterior à data atual';
@else
    echo '<br>$endDate for igual ou posterior à data atual';
@endif
-->

                <div class="sidebar-module sidebar-module-inset">
                    <ul class="list-group">
                        <li class="list-group-item">
                            @if ($userParticipating && isset($createdAt))
                                <p>@lang('messages.participated_at', [
                                    'date' => $createdAt->format('d/m/Y'),
                                    'time' => $createdAt->format('H:i'),
                                ])</p>
                            @else
                            @if (strtotime($endDate) < strtotime(date('Y-m-d')))
                                <button type="button" class="btn btn-danger btn-block" disabled>
                                        @lang('messages.participation_closed')
                                    </button>
                                @else
                                        <p>@lang('messages.ends_at', [
                                            'date' => date('d/m/Y', strtotime($bidding['ends'])),
                                            'time' => '23:59:59',
                                        ])</p>
                                @endif
                            @endif
                        </li>
                        <li class="list-group-item text-center">
                            <div class="sidebar-module sidebar-module-inset text-center">
                                @if (strtotime($bidding['ends']) >= time())
                                    @if ($userParticipating)
                                        <form action="{{ route('participate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="id_bidding" value="{{ $bidding['id'] }}">
                                            <input type="hidden" name="status" value="active">
                                            <button type="submit" class="btn btn-danger btn-block">@lang('messages.cancel_participation')</button>
                                        </form>
                                    @else
                                        <form action="{{ route('participate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                            <input type="hidden" name="id_bidding" value="{{ $bidding['id'] }}">
                                            <input type="hidden" name="status" value="active">
                                            <button type="submit" class="btn btn-success btn-block">@lang('messages.participate')</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>


                <br>


                @if ($userParticipating)
                <div class="sidebar-module sidebar-module-inset">
                    <ul class="list-group">
                    @if (strtotime($bidding['ends']) >= time())
                        <li class="list-group-item">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAddDocument">
                                {{ __('messages.add_documents') }}
                            </button>

                        </li>
                    @endif
                        @if (!empty($Uploads) && count($Uploads) > 0)
                            <li class="list-group-item">
                                <h4>{{ __('messages.uploaded_documents') }}</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.name') }}</th>
                                            @if (strtotime($bidding['ends']) >= time())
                                            <th>{{ __('messages.actions') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($Uploads as $document)
                                        <tr>
                                            <td class="text-left">
                                                <a href="{{ route('document.view', ['id' => $document->id]) }}" target="_blank" title="{{ $document->category_name }} - {{ __('messages.click_to_view') }}">
                                                     @if (!empty($document->subcategory_name))
                                                        {{ $document->subcategory_name }}
                                                    @else
                                                         {{ $document->category_name }}
                                                    @endif
                                                </a>
                                            </td>
                                            @if (strtotime($bidding['ends']) >= time())
                                            <td>
                                                <form action="{{ route('document.delete', ['id' => $document->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>
                            </li>
                         @else
                            <li class="list-group-item">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <p>{{__('messages.no_attachment')}}</p>
                                        </tr>
                                    </thead>
                                </table>
                            </li>
                         @endif
                    </div>
                    </ul>
                @endif

        <br>



            @if ($userParticipating AND $countInfoText)
                <div class="sidebar-module sidebar-module-inset">
                    <ul class="list-group">
                    @if (strtotime($bidding['ends']) >= time())
                        <li class="list-group-item">
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalAddSubmitted">
                                {{ __('messages.uploaded_documents_requested') }} ( {{ $countInfoText }} )
                            </button>

                        </li>
                    @endif
                        @if (!empty($InfoUploads) && count($InfoUploads) > 0)
                            <li class="list-group-item">
                                <h4>{{ __('messages.requests_submitted') }}</h4>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>{{ __('messages.name') }}</th>
                                            @if (strtotime($bidding['ends']) >= time())
                                                <th>{{ __('messages.actions') }}</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($InfoUploads as $document)
                                        <tr>
                                            <td class="text-left">
                                                <a href="{{ route('information.view', ['id' => $document->id]) }}" target="_blank">
                                                    {{ $document->title }} - {{ $document->description }}


                                                </a>
                                            </td>
                                            @if (strtotime($bidding['ends']) >= time())
                                            <td >
                                                <form action="{{ route('information.delete', ['id' => $document->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                            @endif
                                        </tr>
                                    @endforeach



                                    </tbody>
                                </table>
                            </li>
                         @else
                            <li class="list-group-item">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <p>{{__('messages.no_informations')}}</p>
                                        </tr>
                                    </thead>
                                </table>
                            </li>
                         @endif
                    </div>
                    </ul>
                </div>
                @endif



        </div>
    </div>




     <!-- modalQuestion -->
     <div class="modal fade" id="modalQuestion" tabindex="-1" aria-labelledby="modalQuestionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalQuestionLabel">@lang('messages.send_inquiry')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('send.question') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="id_bidding" value="{{ $bidding['id'] }}">
                        <div class="form-group">
                            <label for="question">@lang('messages.question')</label>
                            <textarea class="form-control" id="question" name="question" rows="5" maxlength="500" placeholder="@lang('messages.enter_question')" required></textarea>
                            <small id="questionHelp" class="form-text text-muted">
                                @lang('messages.max_characters'): <span id="counter">500</span>
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('messages.send')</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.close')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- modalAddDocument -->
<div class="modal fade" id="modalAddDocument" tabindex="-1" role="dialog" aria-labelledby="modalAddDocumentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddDocumentLabel">{{ __('messages.documents') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('messages.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                <input type="hidden" name="id_bidding" value="{{ $bidding['id'] }}">

                <div class="form-group">
                    <label for="category">{{ __('messages.select_category') }}</label>
                    <select class="form-control" id="category" name="id_category" required>
                        <option value="" disabled selected>{{ __('messages.select_category_placeholder') }}</option>
                        @foreach($categories as $category)
                            @if ($category->parent_id === null AND $category->id_countries == $bidding['countrie'])
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>


                <div class="form-group" id="subcategory-wrapper" style="display: none;">
                    <label for="subcategory">{{ __('messages.select_subcategory') }}</label>
                    <select class="form-control" id="subcategory" name="id_subcategory" required>
                        <option value="" disabled selected>{{ __('messages.select_subcategory_placeholder') }}</option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="document">{{ __('messages.upload_document') }}</label>
                    <input type="file" class="form-control-file" id="document" name="document" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.upload') }}</button>
            </form>

            </div>
        </div>
    </div>
</div>
<!-- modalAddSubmitted -->
<div class="modal fade" id="modalAddSubmitted" tabindex="-1" role="dialog" aria-labelledby="modalAddSubmittedLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddDocumentLabel">{{ __('messages.requests') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('messages.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('uploadSol.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                <input type="hidden" name="id_bidding" value="{{ $bidding['id'] }}">

                <div class="form-group">
                    <label for="information">{{ __('messages.requests_select') }}</label>
                    <select class="form-control" id="id_information" name="id_information" required>
                        @foreach($InfoText as $info)
                            <option value="{{ $info->id }}">
                            {{ $info->title . ' - ' . $info->description }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="question">@lang('messages.response') </label>
                    <textarea class="form-control" id="file_description" name="file_description" rows="5" maxlength="500" placeholder="@lang('messages.enter_response')" required></textarea>
                    <small id="questionHelp" class="form-text text-muted">
                        @lang('messages.max_characters'): <span id="counter">500</span>
                    </small>
                </div>

                <div class="form-group">
                    <label for="document">{{ __('messages.upload_document') }}</label>
                    <input type="file" class="form-control-file" id="document" name="document" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.upload') }}</button>
            </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const textarea = document.getElementById('question');
        const counter = document.getElementById('counter');

        textarea.addEventListener('input', function () {
            const remainingChars = 500 - textarea.value.length;
            counter.textContent = remainingChars;

            if (remainingChars < 0) {
                textarea.value = textarea.value.substring(0, 500);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var subcategories = {!! json_encode($subcategories) !!};
        var $subcategorySelect = $('#subcategory');
        var $subcategoryWrapper = $('#subcategory-wrapper');
        var $noSubcategoriesOption = $('<option>', {
            value: '',
            text: '{{ __('messages.no_subcategories_available') }}'
        });

        $('#category').change(function() {
            var categoryId = $(this).val();
            $subcategorySelect.empty();

            var matchingSubcategories = subcategories.filter(function(subcategory) {
                return subcategory.parent_id == categoryId;
            });

            if (matchingSubcategories.length > 0) {
                $subcategoryWrapper.show();
                $subcategorySelect.removeAttr('disabled');
                $.each(matchingSubcategories, function(index, subcategory) {
                    $subcategorySelect.append($('<option>', {
                        value: subcategory.id,
                        text: subcategory.name
                    }));
                });
            } else {
                $subcategoryWrapper.hide();
                $subcategorySelect.attr('disabled', 'disabled').append($noSubcategoriesOption);
            }
        });
    });
</script>

</main>
@endsection
