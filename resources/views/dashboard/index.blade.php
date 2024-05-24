@extends('layout')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<main class="login-form">
    <div class="container">
        <h4>{{ __('messages.bidding_list') }}</h4>

                <table id="biddingsTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nº </th>
                            <th>@lang('messages.reference')</th>
                            <th>@lang('messages.title')</th>
                            <th>@lang('messages.date')  @lang('messages.ends')</th>
                            <th>@lang('messages.status')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($paginator as $bidding)
                        <tr class="clickable-row" data-href="{{ route('bidding.details', ['id' => $bidding['id']]) }}" style="cursor: pointer;">
                        <td>
                                {{ str_replace('-', '/', $bidding['id']) }}
                            </td>
                            <td>
                                {{ str_replace('-', '/', $bidding['reference']) }}
                            </td>
                            <td>

                                    {{ (strlen($bidding['title'] !== '' ? $bidding['title'] : $bidding['procedure_kind']) > 200) ? (substr($bidding['title'] !== '' ? $bidding['title'] : $bidding['procedure_kind'], 0, 200) . '...') : ($bidding['title'] !== '' ? $bidding['title'] : $bidding['procedure_kind']) }}

                            </td>
                            <td>{{ date('d/m/Y', strtotime($bidding['ends'])) }}</td>
                            <td>{{ __('messages.' . $bidding['status_code']) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span>Total: {{ $paginator->total() }} itens</span>
                    <div id="paginationLinks">{!! $paginator->links('pagination::bootstrap-4') !!}</div> <!-- Apply Bootstrap 4 CSS to paginator -->
                </div>

    </div>
</main>
<script>
    $(document).ready(function() {
        // Adiciona um ouvinte de evento de clique a todas as linhas com a classe "clickable-row"
        $('.clickable-row').click(function() {
            // Obtém o valor do atributo "data-href" da linha clicada
            var url = $(this).data('href');

            // Redireciona o usuário para a URL da página de detalhes do lance
            window.location.href = url;
        });
    });
</script>
<script>
    $(document).ready(function() {
        const dataTable = $('#biddingsTable').DataTable({
            paging: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        });
        // Search functionality
        $('#searchInput').on('keyup', function() {
            dataTable.search($(this).val()).draw();
        });
        // Atualiza a tabela quando a quantidade de itens por página é alterada
        $('#itemsPerPage').change(function() {
            const selectedValue = $(this).val();
            dataTable.page.len(selectedValue).draw();
        });
    });
</script>

@endsection
