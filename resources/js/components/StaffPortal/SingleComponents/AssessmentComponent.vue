<template>
    <div class="container">
        <div class="row justify-content-center">
            <p>{{assessment.id}}</p>
            <p>{{assessment.url}}</p>
            <p>{{assessment.name}}</p>
            <p>{{assessment.gradable}}</p>
            <p>{{assessment.max_score}}</p>
            <p>{{assessment.assigned_date}}</p>
            <p>{{assessment.due_date}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['assessment'],
        mounted() {
            console.log('component mounted');
        }
    }
</script>