<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top"
             data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
             alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
             src="/storage/{{ $annonce->photo }}"
             data-holder-rendered="true">
        <div class="card-body">
            <p class="card-text">{{ $annonce->titre }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/annonces/{{ $annonce->id }}" type="button" class="btn btn-sm btn-outline-secondary">voir</a>
                    @if( $auth )
                    <a href="{{ $annonce->id }}/change" type="button" class="btn btn-sm btn-outline-secondary">changer</a>
                    <a href="delete/{{ $annonce->id }}" type="button" class="btn btn-sm btn-outline-secondary">supp</a>
                        @endif
                </div>
                <small class="text-muted"></small>
            </div>
        </div>
    </div>
</div>
