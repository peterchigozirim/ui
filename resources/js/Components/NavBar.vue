<template>
    <div class="fixed top-0 left-0 right-0 z-50" :style="bg">
        <div class="max-w-6xl w-11/12 lg:w-auto mx-auto h-20 items-center font-bold capitalize text-white flex">
            <div class="flex-grow flex justify-between font-bold text-lg">
                <div>
                    <Link :href="route('index')">
                        your logo
                    </Link>
                </div>
                <div class="md:hidden text-xl border rounded p-1 px-2">
                    <font-awesome :icon="['fas', 'bars']"></font-awesome>
                </div>
            </div>
            <div class="md:flex h-full hidden  items-center gap-4 ">
                <div>
                    <Link :href="route('index')">
                        home
                    </Link>
                </div>
                <div>
                    <Link  @click="alert('hi')">
                        about us
                    </Link>
                </div>
                <div>
                    <Link>
                        blog
                    </Link>
                </div>
                <div>
                    <Link>
                        contact
                    </Link>
                </div>
                <div>
                    <Link>
                        service
                    </Link>
                </div>
                <div v-if="darkMode == true" class="text-lg cursor-pointer" @click="toggleDarkMode()">
                    <font-awesome :icon="['fas', 'sun' ]"></font-awesome>
                </div>
                <div v-else class="text-lg cursor-pointer text-slate-900" @click="toggleDarkMode()">
                    <font-awesome :icon="['fas', 'moon' ]"></font-awesome>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    export default defineComponent({
        components:{Link,},
        data(){
            return {
                scrolled: 0,
                bg:'background-color:rgba(255,255,255,0);',
                darkMode:false,
            }
        },
         methods:{
            handleScroll(){
                this.scrolled = window.scrollY;
                // this.openNav = false;
                if(this.scrolled > 70){
                    this.bg=`background-color:rgba(37,15,138,${this.scrolled++});`;
                    this.xclass = 'sm:text-black dark:text-white md:dark:text-gray-900';
                }else{
                    this.bg=`background-color:rgba(37,15,138,${this.scrolled/100});`;
                    this.xclass = 'text-black sm:text-white dark:text-white';
                }
            },
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
        },
        created () {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed () {
            window.removeEventListener('scroll', this.handleScroll);
        },
    })
</script>

<style>

</style>