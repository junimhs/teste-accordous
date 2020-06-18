@component('mail::message')
    <h1># O Fornecedor: {{ $name }}, acabou de ser cadastrado.</h1>
    <p>Para ativar o fornecedor basta clicar no botão abaixo.</p>
    @component('mail::button', ['url' => $link, 'color' => 'success'])
        Ativar Fornecedor
    @endcomponent
@endcomponent
