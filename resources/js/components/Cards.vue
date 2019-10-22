<template>
    <div>
        <!--<div v-for="doc in documents" v-bind:key="doc.id">-->
        <!--<h1>{{ doc.name }}</h1>-->
        <!--<p>{{ doc.body }}</p>-->
        <!--</div>-->
        <div class="row">
        <div v-for="doc in documents" v-bind:key="doc.id">
            <md-card class="md-accent" md-with-hover>
                <md-ripple>
                    <md-card-header>
                        <div class="md-title">{{ doc.name }}</div>
                    </md-card-header>

                    <md-card-content>

                    </md-card-content>
                    {{ doc.body }}
                    <md-card-actions>
                        <md-button><md-icon>edit</md-icon></md-button>
                        <md-button @click="deleteDoc(doc, doc.id)"><md-icon>delete</md-icon></md-button>
                    </md-card-actions>
                </md-ripple>
            </md-card>
        </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: 'cards',
        data: function() {
            return {
                documents: [],
                document:{name: '',body: ''},
                test: 5,
            }
        },
        created() {
            this.getDocuments();
        },
        methods: {
            getDocuments() {
                axios
                    .get('/document')
                    .then(response => {
                        this.documents = response.data.data
                    })
                    .catch( err => {
                        console.log(err)
                    });
            },
            deleteDoc(document, index){
                const confirm = confirm(`Delete document ${document.name}`);
                if(confirm){
                    axios.delete(`/doc/${document.id}`)
                        .then(()=>{
                            this.documents.splice(index, 1);
                        })
                }
            },
        }
    }
</script>

<style>
    .md-card {
        width: 320px;
        margin: 4px;
        display: inline-block;
        vertical-align: top;
    }

</style>
