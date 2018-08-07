<template>
   <div class="chat__message" :class="{ 'chat__message--own' : message.selfOwned }">
       <strong class="chat__message-user">
           {{ message.user.name }}
       </strong>
       <span class="chat__message-timestamp">
           {{ message.created_at }}
       </span>
       <span class="chat__message-body">
            {{ message.body }}
       </span>
   </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>

<style scoped>

    .chat__message--own {
        background-color: #f0f0f0;
    }

    .chat__message {
        padding: 15px;
        border-bottom: 1px solid #eee;
    }

    .chat__message-user {
        font-weight: 800;
    }

    .chat__message-timestamp {
        color: #aaa;
    }

    .chat__message-body {
        margin-bottom: 0;
        white-space: pre-wrap;
    }
</style>
