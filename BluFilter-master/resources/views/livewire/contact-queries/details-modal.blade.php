
<form wire:submit.prevent="sendReply">
    @if($contact_query)
        <div class="form-group row">
            <label class="col-sm-1 col-form-label">@lang('messages.users.name')</label>
            <div class="col-sm-5">
                <input class="form-control" type="text" value="@if($contact_query) {{  $contact_query->name }} @endif" readonly>
            </div>

            <label class="col-sm-1 col-form-label">@lang('messages.general.email')</label>
            <div class="col-sm-5">
                <input class="form-control" value="@if($contact_query) {{ $contact_query->email }} @endif" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label">@lang('messages.general.subject')</label>
            <div class="col-sm-11">
                <input class="form-control" type="text" value="@if($contact_query) {{ $contact_query->subject }} @endif" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">@lang('messages.general.message')</label>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <textarea class="form-control" rows="10" readonly
                          style="overflow-y: scroll;">@if($contact_query) {!! $contact_query->message !!} @endif
                </textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">@lang('messages.general.reply')</label>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <textarea wire:model="reply_message" class="form-control" rows="10"
                          style="resize: none; overflow-y: scroll;"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success waves-effect waves-light send-reply">
                    <span class="spinner-grow spinner-grow-sm" style="display: none;" id="loader" role="status" aria-hidden="true"></span>
                    @lang('messages.general.reply_send')
                </button>
                <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal" aria-label="Close">
                    @lang('messages.general.cancel')
                </button>
            </div>
        </div>
    @endif


</form>

