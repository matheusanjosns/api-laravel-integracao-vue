<template>
    <div>
        <h1> Editar {{this.$route.params.id}}</h1>
    
   

    <div class="row">

    <div class="col-6">
     <b-form-input v-model="cep" placeholder="Cep"></b-form-input>
    </div>

    <div class="col-6">
    <b-form-input  v-model="estado" placeholder="Estado"></b-form-input>    
    </div>

    <div class="col-6">
        <b-form-input  v-model="cidade" placeholder="Cidade"></b-form-input>
       
    </div>
    <div class="col-6">
        <b-form-input v-model="endereco" placeholder="Endereco"></b-form-input>
       
    </div>
    <div class="col-6">
        <b-form-input v-model="numero" placeholder="Numero"></b-form-input>
       
    </div>
    <div class="col-6"> 
        <b-form-input v-model="nome_contato" placeholder="Nome"></b-form-input>
        
    </div>
    <div class="col-6">
        <b-form-input  v-model="email_contato" placeholder="Email"></b-form-input>
        
    </div>
    <div class="col-6">
        <b-form-input v-model="telefone_contato" placeholder="Telefone"></b-form-input>
        
    </div>
    <div class="row">
        <div class="col-12">
         <b-button @click="update" block variant="primary">Salvar</b-button>
         <b-button @click="exclui" block variant="danger">Excluir</b-button>
         <div v-if="excluido" class="alert alert-success">Excluido com sucesso</div>
        </div>
    </div>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                cep:"",
                estado:"", 
                cidade:"",
                endereco:"",
                numero:"",
                nome_contato:"",
                email_contato:"",
                telefone_contato:"",
                excluido: false,
            };
        },
        methods: {
            getUser(){
                this.$http.get(`editar/${this.$route.params.usuario}`).then((reponse)=>{
                    this.cep = reponse.data.cep,
                    this.estado = reponse.data.estado
                    this.cidade = reponse.data.cidade
                    this.endereco = reponse.data.endereco
                    this.numero = reponse.data.numero
                    this.nome_contato = reponse.data.nome_contato
                    this.email_contato = reponse.data.email_contato
                    this.telefone_contato = reponse.data.telefone_contato
                })
            },
            update(){
                var data = {cep: this.cep, estado: this.estado, cidade: this.cidade, endereco: this.endereco, numero: this.numero, nome_contato: this.nome_contato, email_contato: this.email_contato, telefone_contato: this.telefone_contato }

                this.$http.put(`update/${this.$route.params.usuario}`,data).then((response)=>{
                console.log(response)
                })

            },
           exclui(){
             this.$http.delete(`delete/${this.$route.params.usuario}`).then((response)=>{
                if(response.data == 'success'){
                    this.excluido = true

                    setTimeout(()=>{
                        this.$route.push('/lista')
                    },1000)
                }
            })

           },
        },
        created(){
            this.getUser()
        }
    };
</script>

<style lang="" scoped>

</style>