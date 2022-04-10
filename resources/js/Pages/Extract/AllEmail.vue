<template>
    <extract-layout>
      <div class="grid grid-cols-4 ml-56 gap-4">
        <div class="col-span-3 min-h-screen space-y-10">
          <div class="w-full h-16  flex justify-between mt-2">
            <div class="text-2xl capitalize font-bold">
              <p>
                dashboard
              </p>
            </div>
            <div>
              <div class="bg-violet-50 dark:bg-zinc-900 h-8 rounded shadow-lg pr-1 flex items-center">
                <input type="text" class="bg-transparent h-full border-0 ring-0 outline-none focus:outline-none focus:ring-0">
                <div class="cursor-pointer">
                  <font-awesome :icon="['fas', 'search']"></font-awesome>
                </div>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-6 gap-4">
            <div class="col-span-2 min-h-[50px] ">

            </div>
          </div>
        </div>

        <div class="col-span-1 min-h-screen bg-violet-50 dark:bg-zinc-900 rounded-xl  shadow-lg">

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