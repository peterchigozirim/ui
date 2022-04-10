<template>
    <div class="bg-[#250f8a]  items-center">
        <div class="max-w-6xl w-11/12 lg:w-auto lg:h-[85vh] mx-auto">
            <div class="grid md:grid-cols-2 h-full gap-8 items-center text-white">
                <div class="space-y-8 mt-[150px] md:my-[150px]">
                    <div class="capitalize md:text-5xl text-3xl font-extrabold">
                        <p>
                            we are here to power your business
                        </p>
                    </div>
                    <div>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae vitae dolorum nulla dicta quam quaerat quo dolorem autem quis incidunt, aliquid consectetur.
                        </p>
                    </div>
                    <div class="flex gap-4 capitalize font-semibold text-center">
                        <div class="border font-semibold border-white shadow-lg shadow-white lg:h-10 items-center flex px-4 rounded">
                            <p>tell us about your business</p>
                        </div>
                        <div class="shadow bg-orange-500 shadow-orange-400  lg:h-10 items-center flex px-4 rounded">
                            <p>let the world know about it!</p>
                        </div>
                    </div>
                </div>
                <div class="md:my-[150px] float-right">
                    <img src="/images/bannerimg.svg" alt="">
                </div>
            </div>
            
        </div>
        <!-- <div v-if="dark == 'dark'" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1e293b" fill-opacity="1" d="M0,192L48,186.7C96,181,192,171,288,181.3C384,192,480,224,576,202.7C672,181,768,107,864,74.7C960,43,1056,53,1152,85.3C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div> -->
        <div class="" >
            <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 130" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop><stop stop-color="rgba(255, 255, 255, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,65L26.7,73.7C53.3,82,107,100,160,101.8C213.3,104,267,91,320,80.2C373.3,69,427,61,480,47.7C533.3,35,587,17,640,21.7C693.3,26,747,52,800,65C853.3,78,907,78,960,80.2C1013.3,82,1067,87,1120,93.2C1173.3,100,1227,108,1280,99.7C1333.3,91,1387,65,1440,60.7C1493.3,56,1547,74,1600,80.2C1653.3,87,1707,82,1760,84.5C1813.3,87,1867,95,1920,86.7C1973.3,78,2027,52,2080,43.3C2133.3,35,2187,43,2240,49.8C2293.3,56,2347,61,2400,65C2453.3,69,2507,74,2560,80.2C2613.3,87,2667,95,2720,101.8C2773.3,108,2827,113,2880,108.3C2933.3,104,2987,91,3040,91C3093.3,91,3147,104,3200,93.2C3253.3,82,3307,48,3360,36.8C3413.3,26,3467,39,3520,49.8C3573.3,61,3627,69,3680,69.3C3733.3,69,3787,61,3813,56.3L3840,52L3840,130L3813.3,130C3786.7,130,3733,130,3680,130C3626.7,130,3573,130,3520,130C3466.7,130,3413,130,3360,130C3306.7,130,3253,130,3200,130C3146.7,130,3093,130,3040,130C2986.7,130,2933,130,2880,130C2826.7,130,2773,130,2720,130C2666.7,130,2613,130,2560,130C2506.7,130,2453,130,2400,130C2346.7,130,2293,130,2240,130C2186.7,130,2133,130,2080,130C2026.7,130,1973,130,1920,130C1866.7,130,1813,130,1760,130C1706.7,130,1653,130,1600,130C1546.7,130,1493,130,1440,130C1386.7,130,1333,130,1280,130C1226.7,130,1173,130,1120,130C1066.7,130,1013,130,960,130C906.7,130,853,130,800,130C746.7,130,693,130,640,130C586.7,130,533,130,480,130C426.7,130,373,130,320,130C266.7,130,213,130,160,130C106.7,130,53,130,27,130L0,130Z"></path></svg>
        </div>
        
    </div>
</template>

<script>
    import { defineComponent } from 'vue';
    export default defineComponent({
        data(){
            return{
                dark: localStorage.theme,
            }
        },
        created(){
            setInterval(function(){
                this.dark
            }, 1000);
            console.log(this.dark);
        }
    })
</script>

<style>

</style>