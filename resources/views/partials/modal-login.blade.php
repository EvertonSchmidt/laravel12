<script>
document.addEventListener('DOMContentLoaded', function () {

  // CPF
  const cpfInput = document.getElementById('exampleInputCPF');
  if (cpfInput) {
    cpfInput.addEventListener('input', function () {
      let value = this.value.replace(/\D/g, '').slice(0, 11);

      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d)/, '$1.$2');
      value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

      this.value = value;
    });
  }

  // TELEFONE
  const telefoneInput = document.getElementById('exampleInputTelefone');
        if (telefoneInput) {
            telefoneInput.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, '').slice(0, 11);

            // (43)9
            value = value.replace(/^(\d{2})(\d)/, '($1) $2');

            // (43)9.9999
            value = value.replace(/(\d{1})(\d{4})(\d)/, '$1.$2$3');

            // (43)9.9999-9999
            value = value.replace(/(\d{4})(\d{4})$/, '$1-$2');

            this.value = value;
            });
        }


  // 💰 DEPÓSITO (R$)
  const depositoInput = document.getElementById('exampleInputSaldo');
  if (depositoInput) {
    depositoInput.addEventListener('input', function () {

      // Remove tudo que não for número
      let value = this.value.replace(/\D/g, '');

      // Converte para centavos
      value = (value / 100).toFixed(2);

      // Formata para pt-BR
      value = value.replace('.', ',');
      value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

      this.value = 'R$ ' + value;
    });
  }

    });
</script>


<div class="modal" id="modalLogin" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro de usuários</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('cliente.store') }}" method="POST">
@csrf

<div class="modal-body">

  <div class="mb-3">
    <label class="form-label">Nome:</label>
    <input type="text" class="form-control"
           name="nome" id="exampleInputEmail1"
           placeholder="Informe o Nome">
  </div>

  <div class="mb-3">
    <label class="form-label">CPF:</label>
    <input type="text" class="form-control"
           name="cpf" id="exampleInputCPF"
           placeholder="Informe o CPF">
  </div>

  <div class="mb-3">
    <label class="form-label">E-mail:</label>
    <input type="email" class="form-control"
           name="email" id="exampleInputEmail"
           placeholder="Informe o E-mail">
  </div>

  <div class="mb-3">
    <label class="form-label">Telefone:</label>
    <input type="text" class="form-control" name="fone" id="exampleInputTelefone" placeholder="Informe o Telefone">
  </div>

  <div class="mb-3">
    <label class="form-label">Data de Nascimento:</label>
    <input type="date" class="form-control"
           name="nascimento" id="exampleInputNascimento">
  </div>

  <div class="row">
    <div class="col-12">
  <div class="mb-3">
        <label class="form-label" for="exampleInputSaldo">Depósito:</label>
        <input type="text" class="form-control" name="saldo" id="exampleInputSaldo" placeholder="Informe o valor do depósito">
  </div>
    </div>
  </div>

        <div class="row">
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" name="permissao" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Administrador</label>
                </div>
            </div>
        </div>

<style>
    #flexSwitchCheckChecked{
        height: 28px;
        width: 60px;
        /* margin:0 15px 0 0; */
        margin: 20px 15px 0 -30px;
    }
    .form-check-label{
        margin: 20px 0;
    }
</style>

</div>

<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
    Fechar
  </button>

  <button type="submit" class="btn btn-primary">
    Salvar
  </button>
</div>

</form>


    </div>
  </div>
</div>
