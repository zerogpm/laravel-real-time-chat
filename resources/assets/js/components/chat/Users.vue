<template>
    <div class="user">
        <div class="user__header">1 user online</div>
        <div class="users__user">
            <a href="#">Chris</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Users"
    }
</script>

<style scoped>
    .user {
        background-color: #fff;
        border: 1px solid #d3e0e9;
        border-radius: 3px;
    }

    .user__header {
        padding: 15px;
        font-weight: 800;
        margin: 0;
    }

    .users__user {
        padding: 0 15px;
        margin-bottom: 10px;
    }


</style>
