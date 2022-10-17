<div>
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-xl-12">
            <div class="content">
                <h4 class="mt-3 ml-3" id="pageTitle">{{ $page->title }}</h4>

                @if($page->featured_image)
                    <div class="row">
                        <img src="{{ $page->featured_image }}" width="300" height="250">
                    </div>
                @endif
                <div class="row m-0">
                    <div class="col-12">
                        <div class="contentRow" id="bodyContnet">
                            {!! $page->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
