<template>
    <div>
        <md-toolbar class="nav-doc" md-elevation="1">
            <div class="md-toolbar-row">
                <div class="md-toolbar-section-start">
                    <md-button class="md-icon-button">
                        <md-icon>home</md-icon>
                    </md-button>
                    <md-button to="/vue/cards" class="md-icon-button">
                        <md-icon>inbox</md-icon>
                    </md-button>
                    <md-button to="/vue/tiptap" class="md-icon-button">
                        <md-icon>add_circle_outline</md-icon>
                    </md-button>
                </div>
            </div>
        </md-toolbar>
    </div>
</template>

<script>
    export default {
        name: "Navbar"
    }
</script>

<style lang="scss" scoped>
    .md-toolbar + .md-toolbar {
        margin-top: 16px;
    }

    .nav-doc{
        background-color: #03dac6;
    }

</style>

