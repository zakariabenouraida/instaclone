<template>
    <div>
        <button class="btn btn-link" @click="likePost">Like</button>
    </div>
</template>

<script>
    export default {
        props:['postId'],
    
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
            likePost(){
                axios.post('/like/'+ this.postId)
                    // .then(response => {
                    //     alert(response.data);
                    // });
            }
        }

    }
</script>
