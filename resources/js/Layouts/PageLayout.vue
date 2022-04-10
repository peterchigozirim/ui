<template>
    <div>
        <div>
            <nav-bar></nav-bar>

        </div>
        <div>
            <slot></slot>
        </div>
    </div>
</template>

<script>
import NavBar from '../Components/NavBar.vue'
export default {
  components: { NavBar },

}
</script>

<style>

</style>