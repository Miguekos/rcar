<template lang="html">
<div class="">
    <v-snackbar
        v-model="snackbar"
        :bottom="y === 'bottom'"
        :left="x === 'left'"
        :multi-line="mode === 'multi-line'"
        :right="x === 'right'"
        :timeout="timeout"
        :top="y === 'top'"
        :vertical="mode === 'vertical'">
        {{ text }}
        <v-btn color="pink" flat="flat" @click="snackbar = false">
            Close
        </v-btn>
    </v-snackbar>
</div>
</template>

<script>
export default {
  data() {
    return {
      snackbar: false,
      y: 'top',
      x: null,
      mode: '',
      timeout: 6000,
      text: 'Hello, I\'m a snackbar'
    }
  }
}
</script>

<style lang="css" scoped>
</style>
