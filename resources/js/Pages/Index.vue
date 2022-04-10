<template>
    <page-layout>
        <head-banner></head-banner>
        <features></features>
        <user-friendly></user-friendly>
        <digital-web></digital-web>
    </page-layout>
</template>

<script>
import DigitalWeb from '../Components/DigitalWeb.vue'
import Features from '../Components/Features.vue'
import HeadBanner from '../Components/HeadBanner.vue'
import UserFriendly from '../Components/UserFriendly.vue'
import PageLayout from '../Layouts/PageLayout.vue'
export default {
  components: { PageLayout,HeadBanner, Features, UserFriendly, DigitalWeb },

}
</script>

<style>

</style>