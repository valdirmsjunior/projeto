@props([
    'title' => '',
    'subtitle' => '',
    'model' => '',
    'headers' => [],
    'records' => '',
    'route' => url()->previous()
])

<div class="card">
    <div class="card-body">
        <h4 class="card-title text-uppercase">{{ $title }}</h4>
        <p class="card-title-desc text-uppercase">{{ $subtitle }}</p>
        {{ isset($slotButton) ? $slotButton : '' }}
        <div class="table-responsive">
            <table class="table mb-0 table-striped table-bordered table-hover">
                <thead class="thead-light">
                    <tr class="table-light">
                        @forelse ($headers as $header)
                        <th class="text-center align-middle text-uppercase fw-bold">
                            {{ $header }}
                        </th>
                        @empty
                        @endforelse
                    </tr>
                </thead>
                <tbody class="">
                    @if($records && method_exists($records, 'links'))
                        @if (!$records->isEmpty())
                            {{ $slot }}
                        @else
                        <tr class="text-center align-middle">
                            <td colspan="10">Nenhum registro encontrado</td>
                        </tr>
                        @endif
                    @else
                        <tr class="text-center align-middle">
                            <td colspan="10">Nenhum registro encontrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="bg-transparent card-footer">
        <div class="row">
            <div class="col-6 text-start">
                @if ($records && $records->total() > 0)
                    Exibindo de {{ $records->firstItem() }} até {{ $records->lastItem() }} de {{ $records->total() }} registro(s)
                @else
                    0 registro(s)
                @endif
            </div>
            <div class="col-6 d-flex justify-content-end">
                @if($records && method_exists($records, 'links'))
                    {!! $records->appends(request()->query())->links()!!}
                @endif
            </div>
        </div>
    </div>
</div>
