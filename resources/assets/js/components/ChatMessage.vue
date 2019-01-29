<template>
    <div>
        <p>{{ message }}</p>
        <small>{{ user }}</small>
    </div>
</template>

<script>
    export default {
        name: "chat-message",
        data() {
            return {
                message: "Voici un message en text",
                user: "Kante Diakaridia"
            }
        }
    }
</script>

<style scoped>

</style>