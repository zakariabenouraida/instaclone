<template>
<body class="flex items-center justify-center vh-100">
  <div id="counter" class="flex flex-column">
    <button
      @click="decrementValue"
      class="button-reset bg-blue ba b--black ph4 pv3 mb2 white f4 dim"
    >Decrement Counter Value</button>
    <button
      @click="incrementValue"
      class="button-reset bg-green ba b--black ph4 pv3 mb2 white f4 dim"
    >Increments Counter Value</button>
    <button
      @click="resetValue"
      class="button-reset bg-red ba b--black ph4 pv3 mb2 white f4 dim"
    >Reset Counter Value</button>
    <div class="f2 tc pa4 mv4 bg-light-gray ba b--light-silver">{{counter}}</div>
  </div>
</body>
</template>

<script>
export default {
  data: {
    counter: $post->likers->count();
  }
};
</script>

<style>
</style>