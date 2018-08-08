<template>
    <div class="user">
        <div class="user__header">{{ users.length }} {{ pluralize('user', users.length) }} online</div>
        <div class="users__user" v-for="user in users">
            <a href="#">{{ user.name }}</a>
        </div>
    </div>
</template>

<script>
    import pluralize from 'pluralize'
    import Bus from '../../bus'
    export default {
        data () {
          return {
            users: []
          }
        },
        methods: {
            pluralize: pluralize
        },
        mounted () {
            Bus.$on('users.here', (users) => {
                this.users = users
            }).$on('users.joined', (user) => {
                this.users.unshift(user);
            }).$on('users.leaving', (user) => {
                this.users = this.users.filter((olderUser) => {
                    return olderUser.id !== user.id
                });
            })
        }
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
