<template>
    <div id="app">
        <Navbar />
        <div class="editor">
        <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Navbar from './Navbar';
    import Tiptap from './Tiptap';


    export default {
        name : 'App',
        components: {
            Navbar,
            Tiptap,
        },
    }

</script>

<style scoped>
    .editor{
        margin-left: 190px;
        margin-right: 190px;
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .editor-bg{
        background-color: #e8eff0;
    }

</style>
