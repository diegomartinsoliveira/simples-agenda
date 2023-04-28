const cadForm = document.getElementById("cad-usuario-form");
const editForm = document.getElementById("edit-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

$(document).ready(function() {
   $('#listar-agendamento').DataTable({
       "processing": true,
       "serverSide": true,
       "ajax": "view/listar_agendamentos.php",
       "language": {
       "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json"
       }
      
   });
});

cadForm.addEventListener("submit", async (e) => {
   e.preventDefault();

   if(document.getElementById("id_usuario").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Selecione um usuário!</div>";
   } else if(document.getElementById("nome").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo nome!</div>";
   } else if(document.getElementById("data").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo data!</div>";
   } else if(document.getElementById("descricao").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo descrição!</div>";
   } else if(document.getElementById("local").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo local!</div>";
   } else if(document.getElementById("contato").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo contato!</div>";
   } else {

   const dadosForm = new FormData(cadForm);
   dadosForm.append("add", 1);

   document.getElementById("cad-usuario-btn").value = "Salvando...";
   
const dados = await fetch("model/cadastrar.php", {
      method:"POST",
      body: dadosForm,
   });

   console.log(dados);

const resposta = await dados.json();

if(resposta['erro']){
   msgAlertaErroCad.innerHTML = resposta['msg'];
   
}else{
   msgAlerta.innerHTML = resposta['msg'];
   cadForm.reset();
   cadModal.hide();
}

$("#listar-agendamento").DataTable().ajax.reload();

   }

   document.getElementById("cad-usuario-btn").value = "Cadastrar";
});

async function visUsuario(id_agendamento){
	const dados = await fetch('controller/visualizar.php?id_agendamento=' + id_agendamento)
   const resposta = await dados.json();

if(resposta['erro']){
   msgAlerta.innerHTML = resposta['msg'];
   }else{

      const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"));
      visModal.show();

      document.getElementById("idAgendamento").innerHTML = resposta['dados'].id_agendamento;
      document.getElementById("nomeAgendamento").innerHTML = resposta['dados'].nome;
      document.getElementById("dataAgendamento").innerHTML = resposta['dados'].data;
      document.getElementById("descricaoAgendamento").innerHTML = resposta['dados'].descricao;
      document.getElementById("localAgendamento").innerHTML = resposta['dados'].local;
      document.getElementById("contatoAgendamento").innerHTML = resposta['dados'].contato;
      document.getElementById("statusAgendamento").innerHTML = resposta['dados'].status;
      
      }
}

const usuario = document.getElementById("id_usuario");
if (usuario) {
    listarUsuarios();
}

async function listarUsuarios() {
    const dados = await fetch('view/listar_usuarios.php');
    const resposta = await dados.json();
    //console.log(resposta);

    if (resposta['id_usuario']) {
        document.getElementById("msgAlertaUsuario").innerHTML = "";

        var opcoes = '<option value="">Selecione</option>';
        for (var i = 0; i < resposta.dados.length; i++) {
            opcoes += '<option value="' + resposta.dados[i]['id_usuario'] + '">' + resposta.dados[i]['nome'] + '</option>';
        }
        usuario.innerHTML = opcoes;
    } else {
        document.getElementById("msgAlertaUsuario").innerHTML = resposta['msg'];
    }
}

const editModal = new bootstrap.Modal(document.getElementById("editUsuarioModal"));
async function editarAgendamento(id_agendamento) {
    //console.log("Editar: " + id);

    const dados = await fetch('controller/visualizar.php?id_agendamento=' + id_agendamento);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {
        document.getElementById("msgAlertaErroEdit").innerHTML = "";

        document.getElementById("msgAlerta").innerHTML = "";
        editModal.show();

      document.getElementById("editid").value = resposta['dados'].id_agendamento;
      document.getElementById("editnome").value = resposta['dados'].nome;
      document.getElementById("editdata").value = resposta['dados'].data;
      document.getElementById("editdescricao").value = resposta['dados'].descricao;
      document.getElementById("editlocal").value = resposta['dados'].local;
      document.getElementById("editcontato").value = resposta['dados'].contato;
      document.getElementById("editstatus").value = resposta['dados'].status;
    } else {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    }
}

const formEditUser = document.getElementById("edit-usuario-form");
if (formEditUser) {
    formEditUser.addEventListener("submit", async(e) => {
        e.preventDefault();
        const dadosForm = new FormData(formEditUser);

        const dados = await fetch("controller/editar.php", {
            method: "POST",
            body: dadosForm
        });

        const resposta = await dados.json();

        if (resposta['erro']) {
            // Manter a janela modal aberta
            //document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg'];

            // Fechar a janela modal
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            document.getElementById("msgAlertErroEdit").innerHTML = "";
            // Limpar o formulario
            formEditUser.reset();
            editModal.hide();

            // Atualizar a lista de registros
            listarDataTables = $('#listar-agendamento').DataTable();
            listarDataTables.draw();
        } else {
            document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg'];
        }
    });
}