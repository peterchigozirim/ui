<template>
    <div class="dark:bg-black/80 bg-slate-50/30 dark:text-gray-200 min-h-[100vh] transition-all duration-500">
        <div :class="openNav? '' : '-ml-52 md:ml-0'" class="nav transition-all duration-500 fixed top-0 left-0 w-52 bg-violet-50 dark:bg-stone-900 min-h-screen rounded-xl  ">
          <extract-sidebar></extract-sidebar>
        </div>
        <div class="w-11/12 mx-auto md:w-auto md:ml-56">
          <!-- <div @click="openNav = !openNav" class="text-xl absolute right-4 top-3 cursor-pointer hover:translate-y-3">
            <font-awesome :icon="['fas', 'bars']"></font-awesome>
          </div> -->
           <div class="w-full h-10 md:h-16 flex justify-between mt-2 sticky top-2 md:hidden">
              <div class="text-2xl capitalize font-bold">
                <slot name="header"></slot>
                
              </div>
              <div>
                <div class="bg-violet-50 dark:bg-zinc-900 h-8 rounded shadow-lg pr-1 md:flex items-center hidden">
                  <input type="text" class="bg-transparent h-full border-0 ring-0 outline-none focus:outline-none focus:ring-0">
                  <div class="cursor-pointer">
                    <font-awesome :icon="['fas', 'search']"></font-awesome>
                  </div>
                </div>
               <div class="md:hidden flex gap-4 h-full items-center">
                  <div v-if="darkMode == true" @click="toggleDarkMode()" class="cursor-pointer">
                    <font-awesome :icon="['fas', 'moon']"></font-awesome>
                  </div>
                  <div v-else @click="toggleDarkMode()" class="cursor-pointer">
                      <font-awesome :icon="['fas', 'sun']"></font-awesome>
                  </div>
                  <div @click="openNav = !openNav" class="text-xl cursor-pointer hover:translate-y-3">
                    <font-awesome :icon="['fas', 'bars']"></font-awesome>
                  </div>
               </div>
              </div>
            </div>
          <slot></slot>
        </div>
    </div>
</template>

<script>
import ExtractSidebar from '../Components/ExtractSidebar.vue'
export default {
  components: { ExtractSidebar },
  data(){
    return{
      openNav: false,
      darkMode: false,
    }
  },
  methods:{
    me(){
      if(this.openNav == false){
        this.openNav = true
        alert(this.openNav)
      }else{
        this.openNav = false
        alert(this.openNav)
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
  }

}
</script>

<style>

</style>