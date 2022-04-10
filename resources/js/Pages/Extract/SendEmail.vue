<template>
    <extract-layout>
      <template #header>
          <p>
            Send Email
          </p>
      </template>
      <form @submit.prevent="sendMail()">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="col-span-3 min-h-screen space-y-10">
          <div class="w-full h-16 hidden md:flex justify-between mt-2 sticky top-2 ">
            <div class="text-2xl capitalize font-bold">
              <p>
                Send mail
              </p>
            </div>
            <div>
              <div class="bg-violet-50 dark:bg-zinc-900 h-8 rounded shadow-lg pr-1 flex items-center">
                <input type="text" placeholder="Search" class="bg-transparent dark:placeholder-white h-full w-80 border-0 ring-0 outline-none focus:outline-none focus:ring-0">
                <div class="cursor-pointer">
                  <font-awesome :icon="['fas', 'search']"></font-awesome>
                </div>
              </div>
            </div>
          </div>
          <div class="grid md:grid-cols-6 gap-4">
            <div class="col-span-4 relative">
                <div @drop.prevent="onDragFiles" @dragover.prevent="dragging = true" @dragleave.prevent="dragging =false" :class="[dragging ? 'bg-violet-100 opacity-20 ' : '', ' h-[400px] cursor-pointer hover:bg-violet-100 hover:opacity-20 bg-violet-50 dark:bg-zinc-900 rounded-md  shadow-lg' ]">
                  <div class="text-center h-full flex justify-center items-center">
                    <div class="text-4xl font-bold space-y-4">
                        <p>
                            Drag your file here
                        </p>
                        <div>
                            <font-awesome :icon="['far', 'file']"></font-awesome>
                        </div>
                        <div @click="$refs.file.click()" :class="enterHover ? 'border-indigo-600 border w-40 mx-auto border-dashed' : ''">
                            <p class="text-base capitalize font-semibold">
                                click to select file
                            </p>
                        </div>
                        <input type="file"  hidden id="" ref="file">
                    </div>
                  </div>
                </div>
                <div class="bg-white rounded-lg shadow-xl w-64 dark:bg-neutral-700 min-h-[40px] p-2 space-y-4 absolute top-10 left-0">
                  <div class="flex justify-between items-center h-6">
                    <div>
                      <p class="italic font-mono">File uploading</p>
                    </div>
                    <div class="rounded-full overflow-hidden h-full cursor-pointer">
                      <font-awesome :icon="['fas', 'rectangle-xmark']" class="text-lg text-red-500/75" />
                    </div>
                  </div>
                  <div v-for="(item, i) in medial" :key="i" class="space-y-1">
                    <div class="text-xs"> {{ item.file.name }} </div>
                    <div  class="rounded-2xl w-full text-xs relative text-center h-4 bg-gray-300 overflow-hidden">
                      <div class="bg-green-500/75 h-full absolute top-0 left-0" :style="`width: ${item.progress}%`">

                      </div>
                      <div class="relative z-10">
                        {{ item.progress + ' %' }}
                      </div>
                      
                    </div>
                    <div v-if="item.error" class="text-xs text-red-500/75 italic">
                        {{ item.error }}
                      </div>
                  </div>
                </div>
            </div>
            <div class="col-span-2 p-6  h-[400px]  bg-blue-800 rounded-md space-y-2 shadow-xl text-white">
              <div class="capitalize font-semibold text-lg">
                <p>
                  email list
                </p>
              </div>
              <div class="flex justify-between mb-2 h-4 items-center" v-for="(emails, i) in emailStore" :key="i">
                <div>
                  <p>
                    {{ emails.email }}
                  </p>
                </div>
                <div @click="removeEmail(emails.id)" class="text-sm text-red-500 cursor-pointer hover:-translate-y-1 transition-all duration-300">
                   <font-awesome :icon="['fas', 'circle-minus']"></font-awesome>
                </div>
              </div>
            </div>
            <div class="col-span-3 bg-violet-50 dark:bg-zinc-900 rounded-md capitalize shadow-lg p-4">
              <div class="space-y-2">
                <p>
                  send to
                </p>
                <div>
                  <input type="enter" v-model="email" class="bg-transparent px-3 w-10/12 h-10 rounded border-opacity-75 border border-slate-900 dark:border-gray-300" @keypress.enter="checkEmail(email)" >
                </div>
              </div>
            </div>
            <div class="col-span-3 bg-violet-50 dark:bg-zinc-900 rounded-md capitalize shadow-lg p-4">
              <div class="space-y-2">
                <p>
                  cc to
                </p>
                <div>
                  <input type="enter"  class="bg-transparent px-3 w-10/12 h-10 rounded border-opacity-75 border border-slate-900 dark:border-gray-300" >
                </div>
              </div>
            </div>
            <div class="col-span-4 bg-violet-50 dark:bg-zinc-900 rounded-md capitalize shadow-lg p-4">
              <div class="space-y-2">
                <p>
                  subject
                </p>
                <div>
                  <input type="enter" v-model="subject" class="bg-transparent px-3 w-10/12 h-10 rounded border-opacity-75 border border-slate-900 dark:border-gray-300"  >
                </div>
              </div>
            </div>
            <div class="col-span-4 grid grid-cols-1 h-full gap-4">
              <div class=" bg-blue-800  shadow-2xl rounded p-6 text-white">
                <label for="title" class="mb-2 font-semibold capitalize block">message</label>
                <span class="bg-blue-100 text-blue-800 dark:bg-gray-900 dark:text-white block">
                    <ckeditor :editor="editor" v-model="message" :config="editorConfig" class="bg-blue-100 text-blue-800 dark:bg-gray-900 dark:text-white"></ckeditor>
                </span>
              </div>
              <div class=" bg-violet-50 dark:bg-zinc-900 rounded-md capitalize shadow-lg p-4">
                <div class="space-y-2">
                  <div>
                    <button class="bg-blue-400/60 flex justify-center items-center rounded-lg shadow-xl h-10 w-16">
                      send
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-span-2 p-6  h-[200px]  bg-blue-800  rounded-md space-y-2 shadow-xl text-white">
              <div class="capitalize font-semibold text-lg">
                <p>
                  cc list
                </p>
              </div>
              <div class="flex justify-between mb-2 h-4 items-center" >
                <div>
                  <p>
                    copy@mail.com
                  </p>
                </div>
                <div @click="removeEmail(emails.id)" class="text-sm text-red-500 cursor-pointer hover:-translate-y-1 transition-all duration-300">
                   <font-awesome :icon="['fas', 'circle-minus']"></font-awesome>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>

        <div class="col-span-1 hidden md:block min-h-screen bg-violet-50 dark:bg-zinc-900 rounded-xl  shadow-lg">

        </div>

      </div>
      </form>

      
    </extract-layout>
</template>

<script>
import { defineComponent } from 'vue';
    import axios from 'axios';
    import { useToast } from "vue-toastification";
    import ExtractLayout from '../../Layouts/ExtractLayout.vue'
    import ClassicEditor  from '@ckeditor/ckeditor5-build-classic';
    export default defineComponent({
      components: { ExtractLayout },
      data(){
          return{
              dragging:false,
              file: '',
              email: '',
              subject: '',
              emailStore: [],
              editor: ClassicEditor,
              editorConfig:{
                    
                },
              message: '',
              enterHover:false,
              // percentage: 0,
              fileupload: false,
              medial:[],
          }
      },
      setup() {
        // Get toast interface
        const toast = useToast();
        return { toast }
       },
       created(){
        this.emailStatus();
       },
      methods:{
        checkEmail(email){
          let at = email.indexOf('@');
          let  dot = email.lastIndexOf('.')
          if(at > 2 && (dot + 2 > at)){
            // this.emailStore.push(this.email)
            // this.email = ''
            axios.post(route('store.email'), {email:this.email})
            .then((res )=>{
              // this.fetchEmail();
              if (res.data.code == 200) {
                this.email= ''
                this.fetchEmail()
                console.log('email store in sessions')
              }else{
                if (res.data.code == 500) {
                  console.error('error occur');
                }
              }
            })
            .catch((error) => {
              console.error(error)
            });
          }
          else{
            alert('invaild email')
          }
        },
        fetchEmail(){
          axios.post(route('fetch.email'))
          .then((res)=>{
            this.emailStore = res.data.message
          })
        },
        removeEmail(id){
          axios.post(route('remove.email'), {id:id})
          .then((res)=>{
            if (res.data.code == 200) {
              this.fetchEmail()
              this.toast.success(res.data.message);
            }else{
              this.toast.error(res.data.message);
            }
          })
        },
        sendMail() {
          let data = new FormData();
          data.append('subject', this.subject);
          data.append('message', this.message);
          axios.post(route('send.mail'), data)
          .then((res)=>{
            if (res.data.code == 200) {
              this.toast.success(res.data.message);
            }else{
              this.toast.error(res.data.message);
            }
          })
          .catch((error) => {
            console.error(error)
          });
        },
        emailStatus(){
          Echo.channel('EmailBroadcast')
          .listen('EmailEvent', (e) => {
            console.log(e)
          });
        },
        onDragFiles($event){
          this.dragging = false;
          let files = [...$event.dataTransfer.items]
          .filter(item => item.kind === 'file')
          .map(item => item.getAsFile());

          files.forEach(file => {
            this.medial.unshift({
              file: file,
              progress: 0,
              error: null,
              uploaded: false
            })
          });

          this.medial.filter(medial => !medial.uploaded).forEach(medial => {
            let form = new FormData;
            form.append('doc', medial.file);

            axios.post(route('upload.files'), form,{
              onUploadProgress: (event) => {
                medial.progress = Math.round(event.loaded * 100 /event.total)
              }
            })
            .then( ()=> medial.uploaded = true)
            .catch(error => {
              medial.error =  'upload fall. please try again later';

              if (error?.response.status === 422) {
                medial.error = error.response.data.errors.doc[0];
                console.log(medial.error);
              }
            })
          });
          console.log(files);
        }
      },

      mounted(){
        this.fetchEmail();
      }

    })
</script>

<style>
    .ck-content.ck-editor__editable{
        min-height: 200px;
        max-height: 250px;
        max-width: 100%;
        border-color: white;
        border: 5px solid;
        background-color:   rgb(29 78 216 / 0.6) !important;
    }
</style>