@if(isset($id))
    <button wire:click="$emit('editItem', {{$id}})" type="button" class="btn btn-sm btn-success">
        <i class="far far fas fa-edit"></i>
    </button>
@elseif(isset($href))
    <a href="{{$href}}" class="btn btn-sm btn-success">
        <i class="far far fas fa-edit"></i>
    </a>
@endif
