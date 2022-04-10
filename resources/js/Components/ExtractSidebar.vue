<template>
    <div class="py-12 w-full">
        <div class="w-10/12 h-screen mx-auto dark:text-gray-200">
            <div class="space-y-10">
                <div class="text-center space-y-3">
                    <div class="w-40 h-40 mx-auto rounded-full border-2 border-zinc-400 overflow-hidden pt-2 bg-slate-100 shadow-inner dark:bg-neutral-600">
                        <img src="/images/default.png" alt="">
                    </div>
                    <div>
                        <p>
                            {{ $page.props.user.name }}
                        </p>
                    </div>
                </div>
                <div class="space-y-2 w-11/12 mx-auto">
                    <Link :href="route('extract')" class="gap-4  h-10 items-center flex capitalize font-bold">
                        <font-awesome :icon="['fas', 'home']" class="flex-greow"></font-awesome>
                        <p>
                            dashboard
                        </p>
                    </Link>
                    <Link :href="route('sendMail')" class="gap-4  h-10 items-center flex capitalize font-bold">
                        <font-awesome :icon="['fas', 'home']" class="flex-greow"></font-awesome>
                        <p>
                            send email
                        </p>
                    </Link>

                </div>
            </div>
            
            <div class="">
                <div class="space-y-4 w-11/12 mx-auto capitalize mt-64 items-end h-full">
                    
                    <div class="flex justify-between">
                        <p v-if="darkMode == true">
                            light mode
                        </p>
                        <p v-else>
                            dark mode
                        </p>
                        <div v-if="darkMode == true" @click="toggleDarkMode()" class="cursor-pointer">
                            <font-awesome :icon="['fas', 'sun']"></font-awesome>
                        </div>
                        <div v-else @click="toggleDarkMode()" class="cursor-pointer">
                            <font-awesome :icon="['fas', 'moon']"></font-awesome>
                        </div>
                        
                    </div>
                    <div>
                        <p>
                            logout
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
    import { Head, Link } from '@inertiajs/inertia-vue3';
    export default {
        components:{
            Link,
        },
        data(){
            return{
                darkMode: false,
            }
        },
        methods:{
            toggleDarkMode(){
                let htmlClasses = document.querySelector('html').classList;
                if(localStorage.theme == 'dark'){
                    localStorage.removeItem('theme')
                    htmlClasses.remove('dark')
                    this.darkMode = false;
                }else{
                    localStorage.theme = 'dark';
                    htmlClasses.add('dark');
                    this.darkMode = true;
                }
            },
        }
    }
</script>

<style>

</style>