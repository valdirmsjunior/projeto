
<div class="modal fade" id="ModalDelete_{{$vaga->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"> 
                    <i class="fas fa-exclamation-triangle" style="color: #e6360a;"></i>
                    &nbsp; Atenção
                </h5>
            </div>
            <div class="modal-body">
                <h5>Deseja realmente Excluir essa Vaga ?</h5>
            </div>
            
            <div class="modal-footer"> 
                <form action="{{ route('admin.vagas.destroy', $vaga)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" id="btn-ok">Excluir</a>
                </form>
            </div>
            
        </div>
    </div>
</div>

