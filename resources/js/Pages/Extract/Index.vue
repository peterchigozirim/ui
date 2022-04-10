<template>
    <extract-layout>
      <template #header>
          <p>
            dashboard
          </p>
      </template>
      <div class="grid lg:grid-cols-4 gap-4">
        <div class="md:col-span-3 min-h-screen space-y-10">
          <div class="w-full h-16 hidden md:flex justify-between mt-2 sticky top-2 ">
            <div class="text-2xl capitalize font-bold">
              <p>
                dashboard
              </p>
            </div>
            <div>
              <div class="bg-violet-50 dark:bg-zinc-900 h-8 rounded shadow-lg pr-1 md:flex items-center hidden">
                <input type="text" class="bg-transparent h-full w-80 border-0 ring-0 outline-none focus:outline-none focus:ring-0">
                <div class="cursor-pointer">
                  <font-awesome :icon="['fas', 'search']"></font-awesome>
                </div>
              </div>
              
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            <div class="md:col-span-2 min-h-[50px] ">
              
            </div>
            <div class="md:col-span-4 bg-violet-50 dark:bg-zinc-900 min-h-[300px] rounded shadow-lg">

            </div>
            <div class="md:col-span-3 bg-violet-50 dark:bg-zinc-900 min-h-[300px] rounded shadow-lg">

            </div>
            <div class="md:col-span-3 bg-violet-50 dark:bg-zinc-900 min-h-[300px] rounded shadow-lg">

            </div>
            <div class="md:col-span-4 bg-violet-50 dark:bg-zinc-900 min-h-[300px] rounded shadow-lg">

            </div>
            <div class="md:col-span-2 bg-violet-50 dark:bg-zinc-900 min-h-[300px] rounded shadow-lg">

            </div>
          </div>
        </div>

        <div class="col-span-1 min-h-screen bg-violet-50 dark:bg-zinc-900 rounded-xl hidden md:block  shadow-lg">

        </div>

      </div>
    </extract-layout>
</template>

<script>
import ExtractLayout from '../../Layouts/ExtractLayout.vue'
export default {
  components: { ExtractLayout },

}
</script>

<style>

</style>