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
        <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" name="nome">Nome:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Informe o Nome">
    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
  </div>
  <div class="mb-3">
    <label for="exampleInputCPF" class="form-label" name="cpf">CPF:</label>
    <input type="text" class="form-control" id="exampleInputCPF" aria-describedby="emailHelp" placeholder="Informe o CPF">
    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail" class="form-label" name="email">E-mail:</label>
    <input type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Informe o E-mail">
    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
  </div>
    <div class="mb-3">
    <label for="exampleInputTelefone" class="form-label" name="fone">Telefone:</label>
    <input type="text" class="form-control" id="exampleInputTelefone" aria-describedby="emailHelp" placeholder="Informe o Telefone">
    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
  </div>
      <div class="mb-3">
    <label for="exampleInputNascimento" class="form-label" name="nascimento">Data de Nascimento:</label>
    <input type="date" class="form-control" id="exampleInputNascimento" aria-describedby="emailHelp" placeholder="Informe a data de nascimento">
    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>

    </div>
  </div>
</div>
