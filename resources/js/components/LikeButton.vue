<template>
    <div>
        <!-- v-text="linkText" -->
        <button class="btn btn-link" @click="likePost">like</button>
    </div>
</template>

<script>
    export default {
        props:['userId','likes'],
    
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.likes,
            }
        },

        methods:{
            likePost(){
                axios.post('/like/'+ this.userId)
                    .then(response => {
                        this.status = ! this.status;

                        console.log("hhhh : " + this.likes);
                        console.log(response.data);
                    });
            }
        },

        // computed: {
        //     linkText() {
        //         return (this.status) ? 'Unlike' : 'Like';
        //     }

        // }

    }
</script>
