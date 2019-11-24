<template>
  <div>
    <button
      class="btn btn-link btn-primary m-2"
      style="color:white;text-decoration:none"
      @click="likePost"
      v-text="buttonText"
    ></button>
  </div>
</template>

<script>
export default {
  props: ["postId", "likes"],

  mounted() {
    console.log("Component mounted.");
  },

  data: function() {
    return {
      status: this.likes
    };
  },

  methods: {
    likePost() {
      //   axios.post("/like/" + this.postId);
      // .then(response => {
      //     alert(response.data);
      // });
      axios
        .post("/like/" + this.postId)
        .then(response => {
          this.status = !this.status;
          console.log(response.data);
        })

        .catch(errors => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    }
  },
  computed: {
    buttonText() {
      return this.status ? "Unlike" : "Like";
    }
  }
};
</script>
