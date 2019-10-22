<template>
    <div class="editor">
        <form novalidate class="md-layout">
            <md-field>
                <label for="name">Name</label>
                <md-input name="name" id="name"/>
            </md-field>
        </form>
        <editor-menu-bar :editor="editor" v-slot="{ commands, isActive }">
            <div class="menubar">

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.bold() }"
                    @click="commands.bold"
                >
                    <md-icon>format_bold</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.italic() }"
                    @click="commands.italic"
                >
                    <md-icon>format_italic</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.strike() }"
                    @click="commands.strike"
                >
                    <md-icon>format_strikethrough</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.underline() }"
                    @click="commands.underline"
                >
                    <md-icon>format_underlined</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.code() }"
                    @click="commands.code"
                >
                    <md-icon>code</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.paragraph() }"
                    @click="commands.paragraph"
                >
                    P
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.heading({ level: 1 }) }"
                    @click="commands.heading({ level: 1 })"
                >
                    H1
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.heading({ level: 2 }) }"
                    @click="commands.heading({ level: 2 })"
                >
                    H2
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.heading({ level: 3 }) }"
                    @click="commands.heading({ level: 3 })"
                >
                    H3
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.bullet_list() }"
                    @click="commands.bullet_list"
                >
                    <md-icon>format_list_bulleted</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.ordered_list() }"
                    @click="commands.ordered_list"
                >
                    <md-icon>format_list_numbered</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.blockquote() }"
                    @click="commands.blockquote"
                >
                    <md-icon>format_quote</md-icon>
                </button>

                <button
                    class="menubar__button"
                    :class="{ 'is-active': isActive.code_block() }"
                    @click="commands.code_block"
                >
                    <md-icon>code</md-icon>
                </button>

                <button
                    class="menubar__button"
                    @click="commands.horizontal_rule"
                >
                    <span>HR</span>
                </button>

                <button
                    class="menubar__button"
                    @click="commands.undo"
                >
                    <md-icon>undo</md-icon>
                </button>

                <button
                    class="menubar__button"
                    @click="commands.redo"
                >
                    <md-icon>redo</md-icon>
                </button>

            </div>
        </editor-menu-bar>

        <editor-content class="editor__content" :editor="editor" />
        <md-button class="md-raised md-primary">Primary</md-button>
    </div>
</template>

<script>
    import { Editor, EditorContent, EditorMenuBar } from 'tiptap'
    import {
        Blockquote,
        CodeBlock,
        HardBreak,
        Heading,
        HorizontalRule,
        OrderedList,
        BulletList,
        ListItem,
        TodoItem,
        TodoList,
        Bold,
        Code,
        Italic,
        Link,
        Strike,
        Underline,
        History,
    } from 'tiptap-extensions'
    export default {
        components: {
            EditorContent,
            EditorMenuBar,
        },
        data() {
            return {
                editor: new Editor({
                    extensions: [
                        new Blockquote(),
                        new BulletList(),
                        new CodeBlock(),
                        new HardBreak(),
                        new Heading({ levels: [1, 2, 3] }),
                        new HorizontalRule(),
                        new ListItem(),
                        new OrderedList(),
                        new TodoItem(),
                        new TodoList(),
                        new Link(),
                        new Bold(),
                        new Code(),
                        new Italic(),
                        new Strike(),
                        new Underline(),
                        new History(),
                    ],
                    content: ``,
                }),
            }
        },
        beforeDestroy() {
            this.editor.destroy()
        },
    }
</script>
<style lang="scss" scoped>
    @import "~vue-material/dist/theme/engine";

    @import "~vue-material/dist/base/theme";
    @import "~vue-material/dist/components/MdCard/theme";

    button {
        z-index: 1;
        position: relative;
        font-size: inherit;
        font-family: inherit;
        color: black;
        padding: 0.5em 1em;
        outline: none;
        border: none;
        background-color: hsl(236, 32%, 26%);
        overflow: hidden;
        transition: color 0.4s ease-in-out;
    }

    button::before {
        content: '';
        z-index: -1;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        background-color: #bfc6c7;
        transform-origin: center;
        transform: translate3d(-50%, -50%, 0) scale3d(0, 0, 0);
        transition: transform 0.45s ease-in-out;
    }

    button:hover {
        cursor: pointer;
        color: #161616;
    }

    button:hover::before {
        transform: translate3d(-50%, -50%, 0) scale3d(15, 15, 15);
    }


    .menubar__button{
        margin-top: 20px;
        background-color: rgb(255, 255, 255);
        border-width: 0px;
        font-size: 22px;
    }

</style>
