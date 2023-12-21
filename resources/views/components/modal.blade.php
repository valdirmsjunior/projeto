@props([
    'title' => '',
    'target' => '',
    'size' => 'lg',
    'message' => '',
    'action' => ''
])

<div 
    class="modal fade"
    id="{{ $target }}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="{{ $target }}"
    aria-hidden="true"
>
    <div class="modal-dialog modal-{{ $size }} modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">{{ $title }}</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="text-center row text-primary">
                        <div class="col-md-12">
                            <h5>{{ $message }}</h5>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{$action}} " method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="btn btn-success" >Sim</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                </form>
                
            </div>
        </div>
    </div>

</div>