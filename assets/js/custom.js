const tbody = document.querySelector(".listar-usuarios");
const cadForm = document.getElementById("cad-usuario-form");
const msgAlertaErroCad = document.getElementById("msgAlertaErroCad");
const msgAlerta = document.getElementById("msgAlerta");
const cadModal = new bootstrap.Modal(document.getElementById("cadUsuarioModal"));

const listarUsuarios = async (pagina) => {
   const dados = await fetch("view/list.php?pagina=" + pagina);
   const resposta = await dados.text();
   tbody.innerHTML = resposta;

}

listarUsuarios(1);

cadForm.addEventListener("submit", async (e) => {
   e.preventDefault();

   if(document.getElementById("nome").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo nome!</div>";
   } else if(document.getElementById("data").value === ""){
      msgAlertaErroCad.innerHTML = "<div class='alert alert-danger' role='alert'>Necessário preencher o campo data!</div>";
   } else {

   const dadosForm = new FormData(cadForm);
   dadosForm.append("add", 1);

   document.getElementById("cad-usuario-btn").value = "Salvando...";
   
const dados = await fetch("model/cadastrar.php", {
      method:"POST",
      body: dadosForm,
   });

const resposta = await dados.json();

if(resposta['erro']){
   msgAlertaErroCad.innerHTML = resposta['msg'];
   
}else{
   msgAlerta.innerHTML = resposta['msg'];
   cadForm.reset();
   cadModal.hide();
   listarUsuarios(1);
}

   }

   document.getElementById("cad-usuario-btn").value = "Cadastrar";
});

async function visUsuario(id){
	const dados = await fetch('controller/visualizar.php?id=' + id)
   const resposta = await dados.json();

if(resposta['erro']){
   msgAlerta.innerHTML = resposta['msg'];
   }else{

      const visModal = new bootstrap.Modal(document.getElementById("visUsuarioModal"));
      visModal.show();

      document.getElementById("id_usuario").innerHTML = resposta['dados'].id;
      document.getElementById("nome").innerHTML = resposta['dados'].nome;
      document.getElementById("data").innerHTML = resposta['dados'].data;
      document.getElementById("descricao").innerHTML = resposta['dados'].descricao;
      document.getElementById("local").innerHTML = resposta['dados'].local;
      document.getElementById("contato").innerHTML = resposta['dados'].contato;
      document.getElementById("status").innerHTML = resposta['dados'].status;
      
      }
}