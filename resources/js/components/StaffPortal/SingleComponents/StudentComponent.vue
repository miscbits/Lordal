<template>
    <div class="row justify-content-center">
        <p>{{student.id}}</p>
        <p>{{student.user.name}}</p>
        <p>{{student.github_username}}</p>
        <p>{{student.user.email}}</p>
    </div>
</template>

<script>
    export default {
        props: ['student'],
        mounted() {
            console.log('component mounted');
        }
    }
</script>