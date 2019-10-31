<template>
    <div>
        <prism-editor
                :lineNumbers="true"
                :code="code"
                v-model="code"
                language="js">
        </prism-editor>
        <textarea style="display: none;" name="code" v-model="code"></textarea>
    </div>
</template>

<script>
    import "prismjs";
    import VuePrismEditor from "vue-prism-editor";

    export default {
        data() {
            return {
                code: ""
            }
        },
        props: {
            initValue: ""
        },
        methods: {

        },
        mounted() {
            this.code = this.initValue;
        },
        components: {
            "prism-editor": VuePrismEditor
        }
    }
</script>

<style scoped>

</style>
