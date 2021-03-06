<div class="option" style="position: relative">
    <i class="enable-admin-controls is-warning fa fa-user-md fa-2x"></i>

    <ul class="admin-controls">
        <li data-id="{{ $post->id }}" class="admin-control btn-admin-control-unflag">
            <i class="fa fa-flag"></i> unflag this post
        </li>

        <li data-id="{{$post->id}}" class="admin-control btn-admin-control-lock">
            @if (! $post->isLocked())
                <i class="fa fa-lock"></i> Lock this post
            @else
                <i class="fa fa-unlock"></i> Unlock this post
            @endif
        </li>

        <li data-id="{{ $post->id }}" class="admin-control btn-admin-control-remove">
            <i class="fa fa-remove"></i> remove this post
        </li>
    </ul>
</div>