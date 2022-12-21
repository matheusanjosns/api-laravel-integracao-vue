<template>
    <div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Cep</th>
      <th scope="col">Estado</th>
      <th scope="col">Cidade</th>
      <th scope="col">Endereco</th>
      <th scope="col">Numero</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="user in listagem " :key="user.id">
      <td>{{user.cep}}</td>
      <td>{{user.estado}}</td>
      <td>{{user.cidade}}</td>
      <td>{{user.endereco}}</td>
      <td>{{user.numero}}</td>
      <td>{{user.nome_contato}}</td>
      <td>{{user.email_contato}}</td>
      <td>{{user.telefone_contato}}</td>
      <td>
        <router-link :to="{name:'editar', params:{usuario:user.id}}">
            <b-button variant="primary">Editar</b-button>
        </router-link>
        <b-button v-b-modal.modal-1 variant="success">add contato</b-button> 
        <b-button variant="danger">Excluir</b-button>
      </td>
    </tr>
  </tbody>
</table>
    
 <div>
  <b-modal id="modal-1" title="Formulario">
   <div class="row">
    
    <div class="col-6">
     <b-form-input v-model="cep" placeholder="Cep"></b-form-input>
     {{cep}}
    </div>
    <div class="col-6">
        <b-form-input v-model="estado" placeholder="Estado"></b-form-input>
        {{estado}}
    </div>
    <div class="col-6">
        <b-form-input v-model="cidade" placeholder="Cidade"></b-form-input>
        {{cidade}}
    </div>
    <div class="col-6">
        <b-form-input v-model="endereco" placeholder="Endereco"></b-form-input>
        {{endereco}}
    </div>
    <div class="col-6">
        <b-form-input  v-model="numero" placeholder="Numero"></b-form-input>
        {{numero}}
    </div>
    <div class="col-6"> 
        <b-form-input v-model="nome_contato" placeholder="Nome"></b-form-input>
        {{nome_contato}}
    </div>
    <div class="col-6">
        <b-form-input v-model="email_contato" placeholder="Email"></b-form-input>
        {{email_contato}}
    </div>
    <div class="col-6">
        <b-form-input v-model="telefone_contato" placeholder="Telefone"></b-form-input>
        {{telefone_contato}}
    </div>
    <div class="row mt-4">
        <div class="col-12">
            
            <button @click="addUsuario" class="btn btn-success block">Enviar</button>

        </div>
    </div>

   </div>
  </b-modal>
 </div>


    </div>
</template>

<script>
    export default {
        data(){
            return {
                listagem: [],
                cep:'',
                estado:'',
                cidade:'',
                endereco:'',
                numero:'',
                nome_contato:'',
                email_contato:'',
                telefone_contato:''
            };
        },
        methods: {
        adicionarListagem(){

        },
        addUsuario(){

            var data = {cep: this.cep, estado: this.estado, cidade: this.cidade, endereco: this.endereco, numero: this.numero, nome_contato: this.nome_contato, email_contato: this.email_contato, telefone_contato: this.telefone_contato }
            
            this.$http.post('adicionar',data).then((response)=>{
                console.log(response)
            })
            
            this.listagem.push(data)

            this.cep = ''
            this.estado = ''
            this.cidade = ''
            this.endereco = ''
            this.numero = ''
            this.nome_contato = ''
            this.email_contato = ''
            this.telefone_contato = ''
            
        },

        getListagem(){
            this.$http.get('lista').then((response)=>{
                this.listagem = response.data
            })
        }
    },
        created (){

            this.getListagem()
        }
    }
   
</script>

<style scoped>

</style>